<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function user() {
        return view('pages.user-management.user-management', [
            'username' => user::all()
        ]);
    }

    public function add() {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
        ]);
        $user = User::create($user);
        // auth()->login($user);

        // user::create($request->except(['email_verified_at', 'remember_token', 'created_at', 'updated_at', 'id']));

        return redirect('/user-management');
    }

    public function edit($id) {
        $user = user::find($id);
        return view('auth.edit-user', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = user::find($id);
        $user->update($request->all());
        return redirect('/user-management');
    }

    public function delete($id) {
        $user = user::find($id);
        $user->delete();
        return redirect('/user-management');
    }
}
