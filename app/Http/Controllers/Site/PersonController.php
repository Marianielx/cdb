<?php

namespace App\Http\Controllers\Site;

use Exception;
use App\Classes\Logger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\{Person, personComment};

class PersonController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['data'] = Person::where('state', 'Procura-se')->OrderBy('id', 'desc')->paginate(3);
        return view('site.person.index', $response);
    }

    public function list()
    {
        $response['data'] = Person::where('fk_userId', Auth::user()->id)->OrderBy('id', 'desc')->paginate(3);
        return view('site.person.index', $response);
    }

    public function show($id)
    {
        $data = Person::find($id);
        return response()->json([
            'status' => 200,
            'person' => $data,
        ]);
    }

    public function details($id)
    {
        $response['data'] = Person::find($id);
        $response['comment'] = personComment::where('fk_personId', $id)->OrderBy("id", "desc")->get();
        $response['count_comments'] = personComment::where('fk_personId', $id)->count();
        return view('user.person.detail.index', $response);
    }

    public function create()
    {
        return view('user.person.create.index');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'fullname' => 'required|min:3|max:255',
                'nickname' => 'required|min:1|max:100',
                'phoneOne' => 'required|min:9|max:20',
                'phoneTwo' => 'required|min:9|max:20',
                'watchStation' => 'required|min:3|max:255',
                'watchPhone' => 'required|min:9|max:20',
                'neighborhood' => 'required|min:3|max:255',
                'missingdate' => 'date',
                'mental_diase' => 'required',
                'mute_and_deaf' => 'required',
                'can_not_see' => 'required',
                'message' => 'required|min:5',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
            ],
            [
                'image.required' => 'Informar a imagem',
                'fullname.required' => 'Informar o nome completo',
                'nickname.required' => 'Informar o apelido',
                'phoneOne.required' => 'Informar o número do telefone 1',
                'phoneTwo.required' => 'Informar o número do telefone 2',
                'watchStation.required' => 'Informar a Esquadra',
                'watchPhone.required' => 'Informar o número do telefone da Esquadra',
                'neighborhood.required' => 'Informar o Bairro',
                'mental_diase.required' => 'Selecionar o estado mental',
                'mute_and_deaf.required' => 'Selecionar o estado da surdez e Mudez',
                'can_not_see.required' => 'Selecionar o estado se pode ver',
                'missingdate.required' => 'Selecionar a data do desaparecimento',
                'message.required' => 'Informar a mensagem',
            ]
        );
        $file = $request->file('image')->store('missing-people-gallery');
        try {
            Person::create(
                [
                    'image' => $file,
                    'fullname' => $request->fullname,
                    'nickname' => $request->nickname,
                    'phoneOne' => $request->phoneOne,
                    'phoneTwo' => $request->phoneTwo,
                    'watchStation' => $request->watchStation,
                    'watchPhone' => $request->watchPhone,
                    'neighborhood' => $request->neighborhood,
                    'mental_diase' => $request->mental_diase,
                    'mute_and_deaf' => $request->mute_and_deaf,
                    'can_not_see' => $request->can_not_see,
                    'missingdate' => $request->missingdate,
                    'message' => $request->message,
                    'fk_userId' => Auth::user()->id,
                    'state' => 'Procura-se',
                ]
            );
        } catch (Exception $e) {
            return redirect()->back()->with('catch', '1');
        }
        return redirect()->route('site.person.index')->with('create', '1');
        $this->Logger->log('info', 'Person Saved - User Nº:' . Auth::user()->id);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $response['data'] = Person::where('fk_userId', Auth::user()->id)->Orwhere('state', 'Procura-se')->Orwhere('fullname', 'Like', '%' . $search . '%')->Orwhere('nickname', $search)->paginate(3);
        return view('site.person.index', $response);
    }

    public function destroy($id)
    {
        Person::find($id)->update(
            ['state' => 'Encontrado',]
        );
        return redirect()->route('site.person.index')->with('edit', '1');
        $this->Logger->log('info', 'Person Inactivated the state - User Nº:' . Auth::user()->id);
    }

    public function update($id)
    {
        Person::find($id)->update(
            ['state' => 'Procura-se',]
        );
        return redirect()->route('site.person.index')->with('edit', '1');
        $this->Logger->log('info', 'Person Activated the state - User Nº:' . Auth::user()->id);
    }
}
