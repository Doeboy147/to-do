<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Todo as Model;
use Illuminate\Support\Facades\Auth;
use Webpatser\Uuid\Uuid;

class Todo extends Controller
{
    public function store(Request $request)
    {
        try {
            $todo = new Model();
            $todo->uuid = Uuid::generate()->string;
            $todo->user_id = Auth::user()->uuid;
            $todo->body = $request['body'];
            $todo->save();

            return redirect('home');
        } catch (QueryException $exception) {
            return view('error', ['message' => $exception->getMessage()]);
        }

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
        $item = Model::where('uuid', $id)->first();
        return view('todo.edit', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        try {
            Model::where('uuid', $id)->update([
                'body' => $request['body'],
                'status' => 0
            ]);
            return redirect('/home');
        } catch (QueryException $exception) {
            return view('error', ['message' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $item = Model::where('uuid', $id)->first();
            $item->delete();
            return redirect('/home');
        } catch (QueryException $exception) {
            return view('error', ['message' => $exception->getMessage()]);
        }
    }
}
