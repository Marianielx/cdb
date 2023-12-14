<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Customer, Customer_Banner_Plan, CustomerBanner};
use Illuminate\Support\Facades\{Auth, Storage};

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
        return view('admin.customBanner.detail.index', $response);
    }

    public function create($id)
    {
        $response['data'] = Customer::find($id);
        $response['plans'] = Customer_Banner_Plan::OrderBy('name', 'asc')->get();;
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
                'deadline' => 'required',
                'fk_planId' => 'required',
            ],
            [
                'image.required' => 'Informar a Imagem',
                'link.required' => 'Informar o LinK',
                'title.required' => 'Informar o Título',
                'alt.required' => 'Informar o Alternativo',
                'deadline.required' => 'Informar o Plano Prazo',
                'fk_planId.required' => 'Informar o Plano',
            ],
        );
        $file = $request->file('image')->store('custom-banner-gallery');
        try {
            CustomerBanner::create(
                [
                    'path' => $file,
                    'link' => $request->link,
                    'title' => $request->title,
                    'alt' => $request->alt,
                    'alt' => $request->alt,
                    'fk_planId' => $request->fk_planId,
                    'fk_customId' => $id,
                    'fk_userId' => Auth::user()->id,
                    'state' => 'Activo',
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('create', '1');
        $this->Logger->log('info', 'Customer Banner Image Saved - User Nº:' . Auth::user()->id);
    }

    public function show($id)
    {
        $response['data'] = Customer::find($id);
        $response['custom'] = Customer::with(['images'])->find($id);
        $response['count']  = CustomerBanner::where("fk_customId", $id)->get()->count();
        $response['bans']  = CustomerBanner::where("fk_customId", $id)->value('id');
        $this->Logger->log('info', 'Get in Custom detail banner ID: ' . $id . ' - User ID:' . Auth::user()->id);
        return view('admin.customBanner.detail.index', $response);
    }

    public function edit($id, $id_)
    {
        $response['data'] = Customer::find($id);
        $response['custom'] = Customer::with(['images'])->find($id);
        $response['count']  = CustomerBanner::where("fk_customId", $id)->get()->count();
        $response['item']  = CustomerBanner::where("fk_customId", $id)->value('id');
        $response['itens']  =  CustomerBanner::find($id_);
        $this->Logger->log('info', 'Get in Custom detail banner ID: ' . $id . ' - User ID:' . Auth::user()->id);
        return view('admin.customBanner.edit.index', $response);
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'link' => 'required|max:255',
                'title' => 'required|max:255',
                'alt' => 'required|max:255',
                'deadline' => 'required',
                'fk_planId' => 'required',
            ],
            [
                'link.required' => 'Informar o LinK',
                'title.required' => 'Informar o Título',
                'alt.required' => 'Informar o Alternativo',
                'deadline.required' => 'Informar o Plano Prazo',
                'fk_planId.required' => 'Informar o Plano',
            ],
        );
        try {
            CustomerBanner::find($id)->update(
                [
                    'link' => $request->link,
                    'title' => $request->title,
                    'alt' => $request->alt,
                    'alt' => $request->alt,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('edit', '1');
        $this->Logger->log('info', 'Customer Banner Updated - User Nº:' . Auth::user()->id);
    }

    public function editImage($id, $id_)
    {
        $response['data'] = Customer::find($id);
        $response['custom'] = Customer::with(['images'])->find($id);
        $response['count']  = CustomerBanner::where("fk_customId", $id)->get()->count();
        $response['item']  = CustomerBanner::where("fk_customId", $id)->value('id');
        $response['itens']  =  CustomerBanner::find($id_);
        $this->Logger->log('info', 'Get in Custom detail banner ID: ' . $id . ' - User ID:' . Auth::user()->id);
        return view('admin.customBanner.edit_image.index', $response);
    }

    public function updateImage(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|min:1|max:5048',
            ],
        );
        $exists = Storage::disk('local')->exists("public/custom-banner-gallery/" . $request->image);
        if ($exists) {
            Storage::delete('public/custom-banner-gallery/' . $request->image);
        }
        $file = $request->file('image')->store('custom-banner-gallery');
        try {
            CustomerBanner::find($id)->update(
                [
                    'path' => $file,
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->back()->with('edit', '1');
        $this->Logger->log('info', 'Customer Banner Updated Image - User Nº:' . Auth::user()->id);
    }

    public function destroy($id)
    {
        try {
            CustomerBanner::find($id)->update(
                [
                    'state' => 'Activo',
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
    }
}
