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
        $response['data'] = CustomerContact::get();
        $this->Logger->log('info', 'Get in Custom Contact ID: ' . $id . ' - User ID:' . Auth::user()->id);
        return view('admin.customContact.list.index', $response);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'custom_charge' => 'required|string|max:50',
                'custom_gmail' => 'required|string|max:255',
                'custom_phone' => 'required|string|max:20',
                'custom_facebook' => 'required|string|max:255',
                'custom_instagram' => 'required|string|max:255',
                'custom_linkedin' => 'required|string|max:255',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $contact = new CustomerContact;
            $contact->custom_charge = $request->input('custom_charge');
            $contact->custom_gmail = $request->input('custom_gmail');
            $contact->custom_phone = $request->input('custom_phone');
            $contact->custom_facebook = $request->input('custom_facebook');
            $contact->custom_instagram = $request->input('custom_instagram');
            $contact->custom_linkedin = $request->input('custom_linkedin');
            $contact->save();
            return response()->json([
                'status'=>200,
                'message'=>'Contacto Adicionado com Sucesso.'
            ]);
        }
    }
}
