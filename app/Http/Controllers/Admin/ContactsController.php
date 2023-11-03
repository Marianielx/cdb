<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Contact;
use App\Classes\Logger;
use App\Models\Internship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function show()
    {
        $response['data'] = Contact::first();
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'Visualizou o contacto');
        return view('admin.contact.details.index', $response);
    }

    public function edit()
    {
        $response['data'] = Contact::first();
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'Entrou em editar o contacto');
        return view('admin.contact.edit.index', $response);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'address' => 'required|min:5|max:255',
                'telephone' => 'required|min:9',
                'email' => ['required', 'string', 'email', 'max:255'],
            ],
            [
                'address.required' => 'Informar o endereço',
                'telephone.required' => 'Informar o número de telefone',
                'email.required' => 'Informar o e-mail',
            ]
        );
        try {
            Contact::find($id)->update($data);
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        $this->Logger->log('info', 'Editou um contacto com o identificador ' . $id);
        return redirect()->route('admin.contact.show')->with('edit', '1');
    }
}
