<?php

namespace App\Http\Controllers\Admin;

use App\Models\Person;
use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\personComment;

class PersonController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $response['data'] = Person::OrderBy('id', 'desc')->get();
        $this->Logger->log('info', 'Listed People');
        return view('admin.person.list.index', $response);
    }

    public function show($id)
    {
        $response['data'] = Person::find($id);
        $this->Logger->log('info', 'Viewed Person With ID: ' . $id);
        return view('admin.person.details.index', $response);
    }
}
