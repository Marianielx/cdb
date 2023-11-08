<?php

namespace App\Http\Controllers\Site;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $response['data'] = Person::where('state', 'Procura-se')->OrderBy('id', 'desc')->paginate(3);
        return view('site.home.index', $response);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $response['data'] = Person::where('state', 'Procura-se')->where('fullname', 'Like', '%' . $search . '%')->where('nickname', $search)->paginate(3);
        return view('site.home.index', $response);
    }
}
