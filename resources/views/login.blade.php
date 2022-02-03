@extends('layouts.master')
@section('title','Login')
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
                <h1 class="card-title mb-4 d-flex justify-content-center fw-bolder" style="font-weight: 700; font-size: 22px">Login</h1>
                <div class="d-flex justify-content-center my-3">
                    Please enter your e-mail and password:
                </div>
                <form action="{{url('/login')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" id="username" name="username" value="{{old('username')}}"
                           class="form-control mb-3"
                           placeholder="Username/Email">
                    <input type="password" id="password" name="password" value="{{old('password')}}"
                           class="form-control mb-3" placeholder="Password">
                    <div class="form-check my-3">
                        <input type="checkbox" class="form-check-input" name="remember" id="rememberCheck">
                        <label class="form-check-label" for="rememberCheck">Remember Me</label>
                    </div>
                    {{-- display first error message if any here --}}

                    <button class="btn w-100">Login</button>
                    <div class="d-flex align-items-center flex-column py-2">
                        <div>Don't have an account ? <a href="{{url('/register')}}">Create one</a></div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
