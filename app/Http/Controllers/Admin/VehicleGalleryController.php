<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\{vehicle, vehicleComment, vehicleGallery};

class VehicleGalleryController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index($id)
    {
        $response['data'] = vehicle::find($id);
        $response['count'] = vehicleGallery::where("fk_idvehicle", $id)->get()->count();
        $response['comment'] = vehicleComment::where('fk_vehicleId', $id)->OrderBy("id", "desc")->get();
        $response['count_comments'] = vehicleComment::where('fk_vehicleId', $id)->count();

        $this->Logger->log('info', 'Viewed Vehicle Gallery With ID: ' . $id);
        return view('admin.gallery.detail.index', $response);
    }
}
