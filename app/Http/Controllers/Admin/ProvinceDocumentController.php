<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Classes\Logger;
use App\Models\Internship;
use Illuminate\Http\Request;
use App\Models\ProvinceDocument;
use App\Http\Controllers\Controller;

class ProvinceDocumentController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function show()
    {
        $response['provinceDocument'] = ProvinceDocument::first();
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'Visualizou  Documento de Pontos de pontos Angola Online');
        return view('admin.provinceDocument.details.index', $response);
    }

    public function edit($id)
    {
        $response['provinceDocument'] = ProvinceDocument::first();
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'entrou em editar Documento de Pontos de pontos Angola Online');
        return view('admin.provinceDocument.edit.index', $response);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'body' => 'required|min:20|',
        ],[
            'body' => 'Informar o conteúdo'
        ]);
        try {
            ProvinceDocument::find($id)->update($data);
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        $this->Logger->log('info', 'Editou Documento de Pontos de pontos Angola Online');
        return redirect()->route('admin.provinceDocument.show')->with('edit', '1');
    }
}
