<?php

namespace App\Http\Controllers;

use App\Mail\MailVerification;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
Use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    public function index(){

        return view('verify');
    }
    public function verifyToken($token){

        //1. Redirect to /login if user is not logged in
        //2. Redirect to /verification with success message if email is already verified
        //3. Check token validity, redirect to /verification with error message if not valid
        //4. Check token expiry, redirect to /verification with error message if already expired
        //5. Update email_verified_at if token is valid and not expired, then redirect to /verification with success message

        if(!Auth::check()) {
            return redirect('/login');
        }

        if(strcmp(Auth::user()->verification->token, $token) != 0) {
            $message="Invalid token";
            return redirect('/verification')->withErrors(['msg'=>$message]);
        }


        if (Auth::user()->verification->expiry >= date("Y-m-d H:i:s")) {
            $message = "token expired";
            return redirect('/verification')->withErrors(['msg' => $message]);
        }

        $user = Auth::user()->id;
        $user = User::find($user);
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();

        return redirect('/');
    }

    public function resendToken(){
        //todo
        //1. Re-generate user verification token (random string 30 character)
        //2. Set token expiry 5 minutes later
        //3. Update verification token
        //4. Send email to user email

        $verification = Verification::find(Auth::user()->id);
        $verification->user_id = Auth::user()->id;
        $verification->token = Str::random(30);
        $verification->expiry = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +5 minutes"));
        $verification->save();

        $mailInfo = [
            'title' => 'Verification',
            'token' => $verification->token,
            'url' => 'http://127.0.0.1:8000/verification/verify/' . $verification->token
        ];

        Mail::to(Auth::user()->email)->send(new WelcomeMail($mailInfo));

        return back()->with('resent','Successfully Resend Email Verification');
    }
}
