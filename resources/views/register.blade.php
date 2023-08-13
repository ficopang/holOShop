@extends('layouts.master')
@section('title','Register')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
@section('content')
<video autoplay muted loop id="backVideo">
    <source src="{{asset('asset/SSS.mp4')}}" type="video/mp4">
</video>
    <div class="d-flex justify-content-center" style="min-height: 100vh">

        <div class="card my-auto" style="min-width: 30vw">
            <div class="card-body">
                <h4 class="card-title mb-4 d-flex justify-content-center">Register</h4>
                <form action="{{url('/register')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" id="username" name="username" value="{{old('username')}}"
                           class="form-control mb-2"
                           placeholder="Username">

                    <input type="email" id="email" name="email" value="{{old('email')}}"
                           class="form-control mb-2"
                           placeholder="Email">
                    <input type="date" id="dob" name="dob" value="{{old('dob')}}"
                           class="form-control mb-2">
                    <input type="password" id="password" name="password"
                           class="form-control mb-2" placeholder="Password">
                    <input type="password" id="conf_password" name="conf_password"
                           class="form-control mb-2" placeholder="Confirm Password">
                    <div class="d-flex justify-content-center">
                        {{-- captcha component here --}}
                        <div class="g-recaptcha"  data-sitekey="{{config('google_captcha.site_key')}}"></div>
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                    </div>
                    {{-- Show first error if any here --}}
                    @if ($errors->any())
                        {{$errors->first()}}
                    @endif
                    <div class="d-flex flex-column align-items-center justify-content-lg-around">
                        <button class="btn btn-primary w-100">Register</button>
                        <small>or</small>
                        <a href="{{url('/login')}}"><small>Sign In Here</small></a>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
