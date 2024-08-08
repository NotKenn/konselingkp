<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Students;

use App\Models\User;


class HomeController extends Controller
{
    public function home()
    {
        $users = User::all();
        $students = Students::all();

        return view('dashboard', compact('users', 'students'));
    }
}
