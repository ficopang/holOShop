<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //todo
        //1. Redirect to /login if user has not logged in
        //2. Redirect to /verification if user email has not been verified
        //3. Return all product and categories (as filter)
        //4. If category filter request exists return product according to the category filter request

        return view('welcome');

    }

}
