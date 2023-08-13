<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }


        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            if(Auth::user()->email_verified_at) {
                return redirect('/');
            } else {
                return redirect('/verification');
            }
        }
        return back()->withErrors("Incorrect username or password")->withInput();

    }

    public function logout()
    {
        //todo
        //logout user
        return back();
    }

}
