<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{Customer, CustomerContact};

class CustomerContactController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index($id)
    {
        $response['custom'] = Customer::find($id);
        $this->Logger->log('info', 'Get in Custom Contact ID: ' . $id . ' - User ID:' . Auth::user()->id);
        return view('admin.customContact.list.index', $response);
    }

    public function fetchcontact($id)
    {
        $contacts = CustomerContact::where('fk_customId', $id)->get();
        return response()->json([
            'contacts' => $contacts,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'charge' => 'required|max:50',
                'email' => 'required|email|max:255',
                'phone' => 'required|min:9|max:9',
            ],
            [
                'charge.required' => 'Informar o campo Responsável',
                'email.required' => 'Informar o campo E-mail',
                'phone.required' => 'Informar o campo Telefone No',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $contact = new CustomerContact;
            $contact->charge = $request->input('charge');
            $contact->email = $request->input('email');
            $contact->phone = $request->input('phone');
            $contact->fk_customId = $request->input('fk_customId');
            $contact->fk_userId = Auth::user()->id;
            $contact->save();
            return response()->json([
                'status' => 200,
                'message' => 'Contacto Adicionado com Sucesso.'
            ]);
        }
    }

    public function edit($id)
    {
        $contact = CustomerContact::find($id);
        if ($contact) {
            return response()->json([
                'status' => 200,
                'contacts' => $contact,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Contacto Não Existe.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'charge' => 'required|max:50',
                'email' => 'required|email|max:255',
                'phone' => 'required|min:9|max:9',
            ],
            [
                'charge.required' => 'Informar o campo Responsável',
                'email.required' => 'Informar o campo E-mail',
                'phone.required' => 'Informar o campo Telefone No',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $contact = CustomerContact::find($id);
            if ($contact) {
                $contact->charge = $request->input('charge');
                $contact->email = $request->input('email');
                $contact->phone = $request->input('phone');
                $contact->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Contacto Alterado com sucesso.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Contacto Não Existe.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $contact = CustomerContact::find($id);
        if ($contact) {
            $contact->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Contacto Excluido com sucesso.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Contacto Não Existe.'
            ]);
        }
    }
}
