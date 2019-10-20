<?php

namespace App\Http\Controllers;

use App\Models\Todo as Model;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function index()
    {
        $todos = Model::paginate(10);
        return view('welcome', ['todos' => $todos]);
    }

    public function getAll()
    {
        return Model::paginate(10);
    }

    public function search(Request $query)
    {
        return Model::where('body', 'LIKE', '%' . $query['search'] . '%')->get();
    }
}
