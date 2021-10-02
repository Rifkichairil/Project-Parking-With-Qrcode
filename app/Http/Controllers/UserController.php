<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get();
        // return view('user.index', compact('users'));
        return view('backend.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->Save();
        return redirect('/user')->with('sukses', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->current_password == '') {
            # code...
            $user->password = Auth::user()->password;
        } else {
            //Change Password
            $user->password = bcrypt($request->current_password);
            $user->save();
        }

        $updateuser = $request->only(["role", "name", "email", "remember_token"]);
        $updateuser['remember_token'] = Str::random(60);
        User::find($id)->update($updateuser);

        return redirect('/users')->with('sukses', 'Data User berhasil diupdate!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('sukses', 'User berhasil dihapus!');
    }
}
