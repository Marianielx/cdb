<?php

namespace App\Http\Controllers\Site;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{vehicle, vehicleComment};

class VehicleGalleryController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['data'] = VehicleGallery::where('state', 'Procura-se')->OrderBy('id', 'desc')->paginate(3);
        return view('site.vehicle.index', $response);
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
                'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
                'vehicle_ownername' => 'required|min:3|max:255',
                'vehicle_ownertelephone' => 'required|min:9|max:20',
                'vehicle_owneraddress' => 'required|min:9|max:255',
                'vehicle_brand' => 'required|min:3|max:50',
                'vehicle_color' => 'required|min:5|max:20',
                'vehicle_card_number' => 'required|min:5|max:20',
                'vehicle_chasis_number' => 'required|min:5|max:50',
                'vehicle_engine_number' => 'required|min:5|max:50',
                'vehicle_board_number' => 'required|min:5|max:50',
                'missingdate' => 'date',
                'message' => 'required|min:5',
            ],
            [
                'vehicle_type.required' => 'Informar o nome completo',
                'image.required' => 'Informar a imagem',
                'vehicle_ownername.required' => 'Informar o nome do proprietário',
                'vehicle_ownertelephone.required' => 'Informar o número do telefone do propretário',
                'vehicle_owneraddress.required' => 'Informar o endereço do proprietário',
                'vehicle_brand.required' => 'Informar o modelo ou a marca da locomotiva',
                'vehicle_color.required' => 'Informar a cor da locomotiva',
                'vehicle_card_number.required' => 'Informar o número da matricula da locomotiva',
                'vehicle_chasis_number.required' => 'Informar o número do chassi',
                'vehicle_engine_number.required' => 'Informar o número do motor',
                'vehicle_board_number.required' => 'Informar o número da placa',
                'missingdate.required' => 'Selecionar a data do desaparecimento',
                'message.required' => 'Informar a mensagem de apelação',
            ]
        );
        $file = $request->file('image')->store('missing-vehicle-gallery');
        try {
            vehicle::create(
                [
                    'vehicle_type' => $request->vehicle_type,
                    'image' => $file,
                    'vehicle_ownername' => $request->vehicle_ownername,
                    'vehicle_ownertelephone' => $request->vehicle_ownertelephone,
                    'vehicle_owneraddress' => $request->vehicle_owneraddress,
                    'vehicle_brand' => $request->vehicle_brand,
                    'vehicle_color' => $request->vehicle_color,
                    'vehicle_card_number' => $request->vehicle_card_number,
                    'vehicle_chasis_number' => $request->vehicle_chasis_number,
                    'vehicle_engine_number' => $request->vehicle_engine_number,
                    'vehicle_board_number' => $request->vehicle_board_number,
                    'missingdate' => $request->missingdate,
                    'message' => $request->message,
                    'fk_userId' => Auth::user()->id,
                    'state' => 'Procura-se',
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->route('site.vehicle.index')->with('create', '1');
        $this->Logger->log('info', 'Vehicle Saved - User Nº:' . Auth::user()->id);
    }
}
