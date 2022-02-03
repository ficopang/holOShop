<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //todo
        //1. Login user through email/username and password
        //2. Set remember token according to remember me request value
        //3. Redirect to /verification with user id as the data if email is not verified
        //4. Redirect to / if email is verified


        return back()->withErrors("Incorrect username or password")->withInput();
    }

    public function logout()
    {
        //todo
        //logout user
        return back();
    }

}
