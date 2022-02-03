<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class CategoryController extends Controller
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
        //3. Display All categories
        return view('manage-category');
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
        //3. Insert Category
        $validator = Validator::make($request->all(),
        [
            'category_name' => 'required',
        ],
        [
            'category_name.required'=>'Category Name must be filled'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator,'insertCategory')->withInput();
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
    public function update(Request $request,$id)
    {
         //todo
        //1. Redirect to /login if user is not logged in
        //2. Validate only user with admin role can access
        //3. Update Category

        $validator = Validator::make($request->all(),
        [
            'category_name' => 'required',
        ],
        [
            'category_name.required'=>'Category Name must be filled'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator,'updateCategory')->withInput();
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
        //3. Delete Category

        return back();

    }
}
