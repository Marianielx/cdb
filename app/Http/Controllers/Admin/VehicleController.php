<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Models\vehicle;
use App\Http\Controllers\Controller;

class VehicleController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    
    public function index()
    {
        $response['data'] = vehicle::OrderBy('id', 'desc')->get();
        $this->Logger->log('info', 'Listed Vehicle');
        return view('admin.vehicle.list.index', $response);
    }

    public function show($id)
    {
        $response['data'] = vehicle::find($id);
        $this->Logger->log('info', 'Viewed Vehicle With ID: ' . $id);
        return view('admin.vehicle.details.index', $response);
    }
}
