<?php

namespace App\Http\Controllers\Site;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{vehicle, vehicleComment};

class VehicleController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['data'] = vehicle::where('vehicle_state', 'Procura-se')->OrderBy('id', 'desc')->paginate(3);
        return view('site.vehicle.index', $response);
    }

    public function list()
    {
        $response['data'] = vehicle::where('fk_userId', Auth::user()->id)->OrderBy('id', 'desc')->paginate(3);
        return view('site.vehicle.index', $response);
    }

    public function show($id)
    {
        $data = vehicle::find($id);
        return response()->json([
            'status' => 200,
            'vehicle' => $data,
        ]);
    }

    public function details($id)
    {
        $response['data'] = vehicle::find($id);
        $response['comment'] = vehicleComment::where('fk_vehicleId', $id)->OrderBy("id", "desc")->get();
        $response['count_comments'] = vehicleComment::where('fk_vehicleId', $id)->count();
        return view('user.vehicle.detail.index', $response);
    }

    public function create()
    {
        return view('user.vehicle.create.index');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'vehicle_type' => 'required|min:3|max:10',
                'vehicle_focus' => 'required|min:3|max:10',
                'vehicle_image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
                'vehicle_ownername' => 'required|min:3|max:255',
                'vehicle_ownertelephone' => 'required|min:9|max:20',
                'vehicle_owneraddress' => 'required|min:9|max:255',
                'vehicle_brand' => 'required|min:3|max:50',
                'vehicle_color' => 'required|min:5|max:20',
                'vehicle_card_number' => 'required|min:5|max:20',
                'vehicle_chasis_number' => 'required|min:5|max:50',
                'vehicle_engine_number' => 'required|min:5|max:50',
                'vehicle_board_number' => 'required|min:5|max:50',
                'vehicle_missingdate' => 'date',
                'vehicle_message' => 'required|min:5',
            ],
            [
                'vehicle_type.required' => 'Informar o tipo de locomotiva',
                'vehicle_focus.required' => 'Informar a peça em destaque',
                'vehicle_image.required' => 'Informar a imagem',
                'vehicle_ownername.required' => 'Informar o nome do proprietário',
                'vehicle_ownertelephone.required' => 'Informar o número do telefone do propretário',
                'vehicle_owneraddress.required' => 'Informar o endereço do proprietário',
                'vehicle_brand.required' => 'Informar o modelo ou a marca da locomotiva',
                'vehicle_color.required' => 'Informar a cor da locomotiva',
                'vehicle_card_number.required' => 'Informar o número da matricula da locomotiva',
                'vehicle_chasis_number.required' => 'Informar o número do chassi',
                'vehicle_engine_number.required' => 'Informar o número do motor',
                'vehicle_board_number.required' => 'Informar o número da placa',
                'vehicle_missingdate.required' => 'Selecionar a data do desaparecimento',
                'vehicle_message.required' => 'Informar a mensagem de apelação',
            ]
        );
        $file = $request->file('vehicle_image')->store('missing-vehicle-gallery');
        try {
            vehicle::create(
                [
                    'vehicle_type' => $request->vehicle_type,
                    'vehicle_focus' => $request->vehicle_focus,
                    'vehicle_image' => $file,
                    'vehicle_ownername' => $request->vehicle_ownername,
                    'vehicle_ownertelephone' => $request->vehicle_ownertelephone,
                    'vehicle_owneraddress' => $request->vehicle_owneraddress,
                    'vehicle_brand' => $request->vehicle_brand,
                    'vehicle_color' => $request->vehicle_color,
                    'vehicle_card_number' => $request->vehicle_card_number,
                    'vehicle_chasis_number' => $request->vehicle_chasis_number,
                    'vehicle_engine_number' => $request->vehicle_engine_number,
                    'vehicle_board_number' => $request->vehicle_board_number,
                    'vehicle_missingdate' => $request->vehicle_missingdate,
                    'vehicle_message' => $request->vehicle_message,
                    'fk_userId' => Auth::user()->id,
                    'vehicle_state' => 'Procura-se',
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->route('site.vehicle.index')->with('create', '1');
        $this->Logger->log('info', 'Vehicle Saved - User Nº:' . Auth::user()->id);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $response['data'] = vehicle::where('fk_userId', Auth::user()->id)->Orwhere('vehicle_state', 'Procura-se')->Orwhere('vehicle_card_number', 'Like', '%' . $search . '%')->Orwhere('vehicle_chasis_number', $search)->Orwhere('vehicle_engine_number', $search)->Orwhere('vehicle_board_number', $search)->paginate(3);
        return view('site.vehicle.index', $response);
    }

    public function destroy($id)
    {
        vehicle::find($id)->update(
            ['vehicle_state' => 'Encontrado',]
        );
        return redirect()->route('site.person.index')->with('edit', '1');
        $this->Logger->log('info', 'Vehicle Inactivated the state - User Nº:' . Auth::user()->id);
    }

    public function update($id)
    {
        vehicle::find($id)->update(
            ['vehicle_state' => 'Procura-se',]
        );
        return redirect()->route('site.vehicle.index')->with('edit', '1');
        $this->Logger->log('info', 'Vehicle Activated the state - User Nº:' . Auth::user()->id);
    }
}
