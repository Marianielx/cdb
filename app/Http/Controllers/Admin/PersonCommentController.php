<?php

namespace App\Http\Controllers\Admin;

use App\Models\Person;
use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\personComment;

class PersonCommentController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $response['data'] = Person::OrderBy('id', 'desc')->get();
        $this->Logger->log('info', 'Listed People Comment');
        return view('admin.personComment.list.index', $response);
    }

    public function show($id)
    {
        $response['data'] = personComment::find($id);
        $response['comment'] = personComment::where('fk_personId', $id)->OrderBy("id", "desc")->get();
        $this->Logger->log('info', 'Viewed Person Commet With ID: ' . $id);
        return view('admin.personComment.details.index', $response);
    }
}
