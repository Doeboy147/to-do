<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Profile as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Webpatser\Uuid\Uuid;

class Profile extends Controller
{

    public function index()
    {
        return view('profile.index');
    }


    public function store(Request $request)
    {
        try {
            if (empty($request->file('profilePic')) === false) {
                $file = $request->file('profilePic');
                $fileName = date('Y-m-d') . '-' . Str::random(16) . '.' . $file->getClientOriginalExtension();
                $imagePath = public_path('images/profiles');
                $file->move($imagePath, $fileName);
            } else {
                $fileName = null;
            }
            $todo = new Model();
            $todo->uuid = Uuid::generate()->string;
            $todo->user_id = Auth::user()->uuid;
            $todo->address = $request['address'];
            $todo->phone_number = $request['phone_number'];
            $todo->profile_pic = $fileName;
            $todo->save();
            return redirect('/home');
        } catch (QueryException $exception) {
            return view('error', ['message' => $exception->getMessage()]);
        }

    }

    public function show()
    {
        try {
            $profile = Model::where('user_id', Auth::user()->uuid)->first();
            return view('profile.edit', ['profile' => $profile]);
        } catch (QueryException $exception) {
            return view('error', ['message' => $exception->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if (empty($request->file('profilePic')) === false) {
                $file = $request->file('profilePic');
                $fileName = date('Y-m-d') . '-' . Str::random(16) . '.' . $file->getClientOriginalExtension();
                $imagePath = public_path('images/profiles');
                $file->move($imagePath, $fileName);
            } else {
                $fileName = $request['profile_pic'];
            }

            Model::where('uuid', $id)->update([
                'address' => $request['address'],
                'phone_number' => $request['phone_number'],
                'profile_pic' => $fileName
            ]);
            return redirect('/home');
        } catch (QueryException $exception) {
            return view('error', ['message' => $exception->getMessage()]);
        }
    }

}
