<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'namaUser' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role'     => 'required'
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );



        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        Auth::login($user);
        return redirect('/users');
    }

    public function edit(string $id): View
    {
        //get post by ID
        $users = User::findOrFail($id);
        //render view with post
        return view('users.edit', compact('users'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $attributes = $request->validate([
            'namaUser'          => 'required',
            'username'          => 'required',
            'role'              => 'required',
            'password'          => 'required'
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        //get post by ID
        $users = User::findOrFail($id);

        $users->update($attributes);
        //redirect to users
        return redirect()->route('users.index');
    }
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $users = User::findOrFail($id);

        //delete post
        $users->delete();

        //redirect to index
        return redirect()->route('users.index');
    }
}
