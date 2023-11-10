<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\{Person, Log};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $response['data'] = Person::where('state', 'Procura-se')->OrderBy('id', 'desc')->paginate(3);
        // $jan = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 01)
        //     ->count();
        // $response['jan'] = json_encode($jan);
        // $fev = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 02)
        //     ->count();
        // $response['fev'] = json_encode($fev);
        // $mar = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 03)
        //     ->count();
        // $response['mar'] = json_encode($mar);
        // $abr = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 04)
        //     ->count();
        // $response['abr'] = json_encode($abr);
        // $maio = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 05)
        //     ->count();
        // $response['maio'] = json_encode($maio);
        // $jun = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 06)
        //     ->count();
        // $response['jun'] = json_encode($jun);
        // $jul = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 07)
        //     ->count();
        // $response['jul'] = json_encode($jul);
        // $ago = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', '08')
        //     ->count();
        // $response['ago'] = json_encode($ago);
        // $set = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', '09')
        //     ->count();
        // $response['set'] = json_encode($set);

        // $out = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', '10')
        //     ->count();
        // $response['out'] = json_encode($out);
        // $nov = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 11)
        //     ->count();
        // $response['nov'] = json_encode($nov);

        // $dez = Log::where('USER_ID', Auth::user()->id)
        //     ->whereMonth('created_at', '=', 12)
        //     ->count();
        // $response['dez'] = json_encode($dez);
        
        return view('site.home.index', $response);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $response['data'] = Person::where('state', 'Procura-se')->where('fullname', 'Like', '%' . $search . '%')->where('nickname', $search)->paginate(3);
        return view('site.home.index', $response);
    }
}
