<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Todo as Model;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class Todo extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $todo = new Model();
        $todo->uuid    = Uuid::generate()->string;
        $todo->user_id = Auth::user()->uuid;
        $todo->body    = $request['body'];
        $todo->save();

        return 'to do added';
    }

    public function getUserList($id)
    {
        return Model::where('user_id', $id)->orderBy('status')->paginate(10);
    }

    public function changeStatus($id, $status)
    {
        return Model::where('uuid', $id)->update(['status' => $status]);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        print_r($id);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
