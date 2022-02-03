<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //todo
        //1. Redirect to /login if user is not logged in
        //2. Validate only user with admin role can access
        //3. Display all product with their respective category name

        return view('manage-product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //todo
        //1. Redirect to /login if user is not logged in
        //2. Validate only user with admin role can access
        //3. Format file name to [current_timestamp]_[filename]
        //4. Upload file to storage
        //5. Insert product


        $validator = Validator::make($request->all(),
        [
            'product_name'=>'required',
            'category_id'=>'required',
            'product_image'=>'required|image',
            'product_price'=>'required|numeric|gt:0',

        ],
        [
            'product_name.required'=>'Product Name must be filled',
            'category_id.required'=>'Product Category must be selected',
            'product_image.required'=>'Product Image must be choosen',
            'product_image.image'=>'Product Image must be an image',
            'product_price.required'=>'Product Price must be filled',
            'product_price.gt'=>'Product Price must be greater than 0'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator,'insertProduct')->withInput();
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //todo
        //1. Redirect to /login if user is not logged in
        //2. Validate only user with admin role can access
        //3. Format file name to [current_timestamp]_[filename]
        //4. Upload file to storage if a file exists in the request
        //5. Update product


        $validator = Validator::make($request->all(),
        [
            'product_name'=>'required',
            'category_id'=>'required',
            'product_price'=>'required|numeric|gt:0',

        ],
        [
            'product_name.required'=>'Product Name must be filled',
            'category_id.required'=>'Product Category must be selected',
            'product_price.required'=>'Product Price must be filled',
            'product_price.gt'=>'Product Price must be greater than 0'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator,'updateProduct')->withInput();
        }

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //todo
        //1. Redirect to /login if user is not logged in
        //2. Validate only user with admin role can access
        //3. Delete Product

        return back();

    }
}
