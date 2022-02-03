<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\MailVerification;
use App\Models\Role;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        return redirect('/verification');
    }

}
