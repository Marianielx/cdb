<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{Customer, CustomerBanner};
use Exception;

class CustomerBannerController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index($id)
    {
        $response['custom'] = Customer::find($id);
        $response['data'] = CustomerBanner::where('fk_customId', $id)->get();
        $this->Logger->log('info', 'Get in Custom Banner ID: ' . $id . ' - User ID:' . Auth::user()->id);
        return view('admin.customBanner.list.index', $response);
    }

    public function create($id)
    {
        $response['data'] = Customer::find($id);
        $this->Logger->log('info', 'Get in Create Banner ID: ' . $id . ' - User ID:' . Auth::user()->id);
        return view('admin.customBanner.create.index', $response);
    }

    public function store(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|min:1|max:5048',
                'link' => 'required|max:255',
                'title' => 'required|max:255',
                'alt' => 'required|max:255',
            ],
        );
        $file = $request->file('image')->store('custom-banner-gallery');
        try {
            CustomerBanner::create(
                [
                    'image' => $file,
                    'link' => $request->link,
                    'title' => $request->title,
                    'alt' => $request->alt,
                    'alt' => $request->alt,
                    'fk_customId' => $id,
                    'fk_userId' => Auth::user()->id,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('create', '1');
        $this->Logger->log('info', 'Customer Banner Image Saved - User Nº:' . Auth::user()->id);
    }

    public function edit($id)
    {
        $banners = CustomerBanner::find($id);
        if ($banners) {
            return response()->json([
                'status' => 200,
                'banners' => $banners,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Anúncio Não Existe.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required|min:1|max:5048',
                'link' => 'required|max:255',
                'title' => 'required|max:255',
                'alt' => 'required|max:255',
                'status' => 'required|max:20',
            ],
            [
                'image.required' => 'Informar o campo Imagem',
                'link.required' => 'Informar o campo Link',
                'title.required' => 'Informar o campo Titulo',
                'alt.required' => 'Informar o campo Alternativo',
                'status.required' => 'Informar o campo Estado',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $data = CustomerBanner::find($id);
            if ($data) {
                $data->link = $request->input('link');
                $data->title = $request->input('title');
                $data->alt = $request->input('alt');
                $data->status = $request->input('status');
                $data->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Anúncio Alterado com sucesso.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Anúncio Não Existe.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $data = CustomerBanner::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Anúncio Excluido com sucesso.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Anúncio Não Existe.'
            ]);
        }
    }
}
