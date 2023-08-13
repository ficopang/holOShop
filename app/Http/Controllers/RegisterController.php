<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\MailVerification;
use App\Mail\WelcomeMail;
use App\Models\Role;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        //todo
        //1. Insert user
        //2. Generate verification token (random string 30 character)
        //3. Set verification token expiry 5 minutes later
        //4. Insert token
        //5. Send email to user email through mailtrap
        //6. Login the registered user

        $rules = [
            'username' => 'required|unique:users|min:5',
            'email' => 'required|unique:users',
            'dob' => 'required|date|before_or_equal:' . date('Y-m-d'),
            'password' => 'required|min:8',
            'conf_password' => 'required|required_with:password|same:password',
            'g-recaptcha-response' => 'required|google_captcha',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $user = new User();
        $user->id = (string) Str::uuid();
        $user->role_id = 1;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $verification = new Verification();
        $verification->user_id = $user->id;
        $verification->token = Str::random(30);
        $verification->expiry = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +5 minutes"));
        $verification->save();

        $mailInfo = [
            'title' => 'Verification',
            'token' => $verification->token,
            'url' => 'http://127.0.0.1:8000/verification/verify/'.$verification->token
        ];


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], false)) {
            Mail::to($request->email)->send(new WelcomeMail($mailInfo));
            return redirect('/verification');
        }
    }

}
