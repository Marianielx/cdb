<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{AngolaOnline, ImageGallery, Internship, Log, Service, User};

class DashboardController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }


    public function index()
    {

        $response['count_users'] = User::count();
        $response['count_services'] = Service::count();
        $response['count_points'] = AngolaOnline::count();
        $response['count_inclusions'] = ImageGallery::count();
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        
        $jan = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 01)
            ->count();
        $response['jan'] = json_encode($jan);

        $fev = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 02)
            ->count();

        $response['fev'] = json_encode($fev);

        $mar = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 03)
            ->count();
        $response['mar'] = json_encode($mar);

        $abr = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 04)
            ->count();
        $response['abr'] = json_encode($abr);
        $maio = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 05)
            ->count();
        $response['maio'] = json_encode($maio);

        $jun = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 06)
            ->count();
        $response['jun'] = json_encode($jun);
        $jul = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 07)
            ->count();
        $response['jul'] = json_encode($jul);
        $ago = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', '08')
            ->count();
        $response['ago'] = json_encode($ago);
        /**d */
        $set = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', '09')
            ->count();
        $response['set'] = json_encode($set);

        $out = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', '10')
            ->count();
        $response['out'] = json_encode($out);
        $nov = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 11)
            ->count();
        $response['nov'] = json_encode($nov);

        $dez = Log::where('USER_ID', Auth::user()->id)
            ->whereMonth('created_at', '=', 12)
            ->count();
        $response['dez'] = json_encode($dez);

        $this->Logger->log('info', 'Entrou no Painel do INFOSI');

        return view('admin.home.index', $response);
    }
}