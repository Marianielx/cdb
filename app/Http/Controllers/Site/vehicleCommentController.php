<?php

namespace App\Http\Controllers\Site;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Models\vehicleComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class vehicleCommentController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'body' => 'required|min:3|max:255',
            ],
            [
                'body.required' => 'Informar o comentário',
            ]
        );
        try {
            vehicleComment::create(
                [
                    'body' => $request->body,
                    'fk_vehicleId' => $request->vehicle_id,
                    'fk_userId' => Auth::user()->id,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->route('site.vehicle.index')->with('create', '1');
        $this->Logger->log('info', 'Vehicle Commentary saved - User Nº:' . Auth::user()->id);
    }

    public function storeAs(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'body' => 'required|min:3|max:255',
            ],
            [
                'body.required' => 'Informar o comentário',
            ]
        );
        try {
            vehicleComment::create(
                [
                    'body' => $request->body,
                    'fk_vehicleId' => $id,
                    'fk_userId' => Auth::user()->id,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('create', '1');
        $this->Logger->log('info', 'Vehicle Commentary saved - User Nº:' . Auth::user()->id . ' logged');
    }
}
