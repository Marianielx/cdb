<?php

namespace App\Http\Controllers\Visitor;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\{Auth, Hash};

class UserController extends Controller
{
    public function create()
    {
        return view('visitor.user.create.index');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required',
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
        $level = 'User';

        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => Hash::make($password),
            'level' => $level,
        );
        try {
            $user =   User::create($data);
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('create', '1');
    }
}
