<?php

namespace App\Http\Controllers;

use App\Models\Todo as Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos   = Model::paginate(5);
        $profile = Profile::where('user_id', Auth::user()->uuid)->first();
        return view('home', ['todos' => $todos, 'profile' => $profile]);
    }
}
