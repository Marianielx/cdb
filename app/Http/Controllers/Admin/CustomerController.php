<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Classes\Logger;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Log, CustomerBanner};
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['data'] = Customer::get();
        $response['custom_total'] = Customer::count();
        $this->Logger->log('info', 'Listed Customer');
        return view('admin.custom.list.index', $response);
    }

    public function create()
    {
        return view('admin.custom.create.index');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'identitynumber' => 'required|string|max:50',
                'fullname' => 'required|string|max:255',
                'nickname' => 'required|string|max:50',
                'address' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
            ],
            [
                'image.required' => 'Informar o Logotipo',
                'identitynumber.required' => 'Informar o NIF',
                'fullname.required' => 'Informar o nome completo',
                'nickname.required' => 'Informar a sigla',
                'address.required' => 'Informar o endereço',
            ]
        );
        $exists = Customer::where('identitynumber', $request['identitynumber'])->exists();
        if ($exists) {
            return redirect()->back()->with('exist_nif', '1');
        }
        $file = $request->file('image')->store('custom-gallery');
        try {
            Customer::create(
                [
                    'image' => $file,
                    'identitynumber' => $request->identitynumber,
                    'fullname' => $request->fullname,
                    'nickname' => $request->nickname,
                    'address' => $request->address,
                    'fk_userId' => Auth::user()->id,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->route('admin.custom.index')->with('create', '1');
        $this->Logger->log('info', 'Custom Saved - User Nº:' . Auth::user()->id);
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Administrator' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {
            $response['data'] = Customer::find($id);
            $this->Logger->log('info', 'Get in Edit Custom With ID: ' . $id);
            return view('admin.custom.edit.index', $response);
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->level != 'Administrator' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {
            $this->validate(
                $request,
                [
                    'identitynumber' => 'required|string|max:50',
                    'fullname' => 'required|string|max:255',
                    'nickname' => 'required|string|max:50',
                    'address' => 'required|string|max:255',
                ],
                [
                    'identitynumber.required' => 'Informar o NIF',
                    'fullname.required' => 'Informar o nome completo',
                    'nickname.required' => 'Informar a sigla',
                    'address.required' => 'Informar o endereço',
                ]
            );
            try {
                Customer::find($id)->update([
                    'identitynumber' => $request->identitynumber,
                    'fullname' => $request->fullname,
                    'nickname' => $request->nickname,
                    'address' => $request->address,
                ]);
            } catch (Exception $e) {
                return redirect()->back()->with('catch', '1');
            }
            $this->Logger->log('info', 'Edited Custom ID: ' . $id);
            return redirect()->route('admin.custom.index')->with('edit', '1');
        }
    }

    public function show($id)
    {
        $response['data'] = Customer::find($id);
        $this->Logger->log('info', 'Get in Show Custom With ID: ' . $id);
        return view('admin.custom.detail.index', $response);
    }
}
