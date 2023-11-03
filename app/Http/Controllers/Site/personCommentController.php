<?php

namespace App\Http\Controllers\Site;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Models\personComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class personCommentController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        
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
            personComment::create(
                [
                    'body' => $request->body,
                    'fk_personId' => $request->person_id,
                    'fk_userId' => Auth::user()->id,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->route('site.person.index')->with('create', '1');
        $this->Logger->log('info', 'Commentary saved - User Nº:' . Auth::user()->id);
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
            personComment::create(
                [
                    'body' => $request->body,
                    'fk_personId' => $id,
                    'fk_userId' => Auth::user()->id,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('create', '1');
        $this->Logger->log('info', 'Commentary saved - User Nº:' . Auth::user()->id . ' logged');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
