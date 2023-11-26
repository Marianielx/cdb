<?php

namespace App\Http\Controllers\Site;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Models\VehicleGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{Vehicle, VehicleComment};

class VehicleGalleryController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['datas'] = VehicleGallery::OrderBy('id', 'desc')->get();
        return view('site.vehicleGallery.index', $response);
    }

    public function show($id)
    {
        $data = VehicleGallery::find($id);
        return response()->json([
            'status' => 200,
            'gallery' => $data,
        ]);
    }

    public function detail($id)
    {
        $response['data'] = Vehicle::find($id);
        $response['count'] = VehicleGallery::where("fk_idvehicle", $id)->get()->count();
        $response['comment'] = VehicleComment::where('fk_vehicleId', $id)->OrderBy("id", "desc")->get();
        $response['count_comments'] = VehicleComment::where('fk_vehicleId', $id)->count();
        return view('user.vehicleGallery.detail.index', $response);
    }

    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'images' => 'required|min:1|max:5048',
            ],
            [
                'image.required' => 'Informar a imagem',
            ]
        );
        try {
            for ($i = 0; $i < count($request->allFiles()['images']); $i++) {
                $file = $request->allFiles()['images'][$i];
                VehicleGallery::create([
                    'path' => $file->store("vehicle_gallery_cover_image/$id"),
                    'fk_idvehicle' => $id
                ]);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('create_image', '1');
        $this->Logger->log('info', 'Saved Vehicke Image Gallery- User Nº:' . Auth::user()->id);
    }
}
