<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Models\{Internship, News};
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['data'] = News::get();
        $response['count'] = News::count();
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'Listou as Noticias');
        return view('admin.news.list.index', $response);
    }

    public function create()
    {
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'Entrou em Criar noticia');
        return view('admin.news.create.index', $response);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:255',
                'typewriter' => 'required|min:2|max:255',
                'body' => 'required|min:5',
                'path' => 'required|image|mimes:jpg,png,jpeg|max:5000',
                'date' => 'required',

            ],
            [
                'title' => 'Informar o título',
                'typewriter' => 'Informar autor',
                'body' => 'Informar o conteúdo',
                'path' => 'Informar a imagem de capa',
                'date' => 'Informar a data',
            ]
        );
        $file = $request->file('path')->store('news_image');
        try {
            $news = News::create([
                'path' => $file,
                'title' => $request->title,
                'typewriter' => $request->typewriter,
                'body' => $request->body,
                'date' => $request->date,
                'state' => 'Autorizada'
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        $this->Logger->log('info', 'Cadastrou uma noticia com o titulo ' . $news->title);
        return redirect("admin/news/show/$news->id")->with('create', '1');
    }

    public function show($id)
    {
        $response['data'] = News::find($id);
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'Visualizar uma noticia com o identificador ' . $id);
        return view('admin.news.details.index', $response);
    }

    public function edit($id)
    {
        $response['data'] = News::find($id);
        $response['internship'] = Internship::where("state", 'Submetido')->count();
        $response['data_internship'] = Internship::OrderBy('id', 'desc')->where("state", 'Submetido')->get();
        $this->Logger->log('info', 'Entrou em editar uma noticia com o identificador ' . $id);
        return view('admin.news.edit.index', $response);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|min:5|max:255',
                'typewriter' => 'required|min:2|max:255',
                'body' => 'required|min:5',
                'path' => 'image|mimes:jpg,png,jpeg|max:5000',
                'date' => 'required',

            ],
            [
                'title' => 'Informar o título',
                'typewriter' => 'Informar autor',
                'body' => 'Informar o conteúdo',
                'path' => 'Informar a imagem de capa',
                'date' => 'Informar a data',
            ]
        );
        if ($file = $request->file('path')) {
            $file = $file->store('news_image');
        } else {
            $file = News::find($id)->path;
        }
        try {
            News::find($id)->update([
                'path' => $file,
                'title' => $request->title,
                'typewriter' => $request->typewriter,
                'body' => $request->body,
                'date' => $request->date,
                'state' => 'Autorizada'
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        $this->Logger->log('info', 'Editou uma noticia com o identificador ' . $id);
        return redirect("admin/news/show/$id")->with('edit', '1');
    }

    public function destroy($id)
    {
        try {
            News::find($id)->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        $this->Logger->log('info', 'Eliminou uma noticia com o identificador ' . $id);
        return redirect()->back()->with('destroy', '1');
    }
}
