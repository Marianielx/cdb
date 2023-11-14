<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Person, vehicle, vehicleGallery};

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home.index');
    }

    public function person()
    {
        $response['data'] = Person::where('state', 'Procura-se')->OrderBy('id', 'desc')->paginate(3);
        return view('site.home.person.index', $response);
    }

    public function vehicle()
    {
        $response['data'] = vehicle::where('vehicle_state', 'Procura-se')->OrderBy('id', 'desc')->paginate(3);
        return view('site.home.vehicle.index', $response);
    }

    public function show($id)
    {
        $response['data'] = vehicle::find($id);
        $response['count'] = vehicleGallery::where("fk_idvehicle", $id)->get()->count();
        return view('site.home.vehicleGallery.index', $response);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $response['data'] = Person::where('state', 'Procura-se')->where('fullname', 'Like', '%' . $search . '%')->where('nickname', $search)->paginate(3);
        return view('site.home.index', $response);
    }
}
