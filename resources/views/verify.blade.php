@extends('layouts.master')
@section('content')
    <div class="container mx-auto">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-4">
                <div class="card my-auto">
                    @if (Auth::check()&&!is_null(Auth::user()->email_verified_at))
                        <div class="card-header">Email Has Been Verified</div>
                        <div class="card-body">
                            Your email has been verified, click the button to visit our store
                            <br>
                            <form action="/" method="get">
                                <button class="btn btn-primary" type="submit">Visit our store</button>

                            </form>
                        </div>
                    @else
                        <div class="card-header">Verify Your Email Address</div>

                        <div class="card-body">
                            Hi {{Auth::user()->username}}, you've created a new customer account at hololive production official shop. All you have to do is activate it.
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @elseif ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    {{$errors->first()}}
                                </div>
                            @endif
                            <div>
                                Before proceeding, please check your email for a verification link.
                                If you did not receive the email,
                                <a href="{{url('/verification/resend')}}">click here to request another</a>.
                            </div>

                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
