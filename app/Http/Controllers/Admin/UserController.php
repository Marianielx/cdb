<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Classes\Logger;
use App\Models\{Log, User};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, Hash};

class UserController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['data'] = User::get();
        $response['count'] = User::count();
        $this->Logger->log('info', 'Listed Users');
        return view('admin.user.list.index', $response);
    }

    public function create()
    {
        return view('admin.user.create.index');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required',
                'level' => 'required',
                'password' => [
                    'required',
                    'confirmed',
                    'min:8',
                    'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#@%]).*$/'
                ],
            ],
            [
                'first_name.required' => 'Informar o primeiro nome',
                'last_name.required' => 'Informar o último nome',
                'email.required' => 'Informar o e-mail',
                'level.required' => 'Informar o nível de acesso',
                'password.required' => 'Informar a senha',
            ]
        );
        $exists_email = User::where('email', $request['email'])->exists();
        if ($exists_email) {
            return redirect()->back()->with('exist_email', '1');
        }
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $level = $request->input('level');

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => Hash::make($password),
            'level' => $level,
        );
        try {
            User::create($data);
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('create', '1');
        $this->Logger->log('info', 'Created User: ' . $request['first_name'] + ' ' + ['last_name']);
    }

    public function show($id)
    {
        if (Auth::user()->level != 'Administrator' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {
            $response['logs'] = Log::where('USER_ID', $id)->orderBy('id', 'desc')->paginate(30);
            $response['data'] = User::find($id);
            $this->Logger->log('info', 'Viewed user With ID: ' . $id);
            return view('admin.user.details.index', $response);
        }
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Administrator' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {
            $response['data'] = User::find($id);
            $this->Logger->log('info', 'Get in Edit User With ID: ' . $id);
            return view('admin.user.edit.index', $response);
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->level != 'Administrator' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {
            $request->validate(
                [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'level' => 'required',
                ],
                [
                    'first_name.required' => 'Informar o primeiro nome',
                    'last_name.required' => 'Informar o último nome',
                    'level.required' => 'Informar o nível de acesso',
                ]
            );
            try {
                User::find($id)->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'level' => $request->level,
                ]);
            } catch (Exception $e) {
                return redirect()->back()->with('catch', '1');
            }
            $this->Logger->log('info', 'Edited User ID: ' . $id);
            return redirect()->route('admin.user.index')->with('edit', '1');
        }
    }

    public function destroy($id)
    {
        $count = User::count();
        if ($count > 1) {
            try {
                User::find($id)->delete();
            } catch (Exception $e) {
                return redirect()->back()->with('catch', '1');
            }
            $this->Logger->log('danger', 'Deleted User ID: ' . $id);
            return redirect()->back()->with('destroy', '1');
        } else {
            return redirect()->back();
        }
    }
}
