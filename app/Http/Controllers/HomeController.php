<?php

namespace App\Http\Controllers;

use App\Models\Todo as Model;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = Model::paginate(5);
        return view('home', ['todos' => $todos]);
    }
}
