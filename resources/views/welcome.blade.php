@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('content')
    <div class="row home-header">
        <div class="header-list d-flex justify-content-center align-items-center">
            <img class="product-header" src="{{ asset('asset/product_header.png') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-2 side-bar">
            <div class="filters">
                <div class="filter-text">
                    Filter by
                </div>
                <div class="filter-content">
                    <div class="accordion accordion-flush" id="categoryAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="categoryHeading">
                                <button class="accordion-button {{app('request')->input('categories')!=null ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#categoryCollapse" aria-expanded="{{app('request')->input('categories')!=null ? 'true' : 'false'}}"
                                    aria-controls="categoryCollapse">
                                   Category
                                </button>
                            </h2>
                            <div id="categoryCollapse" class="accordion-collapse collapse {{ app('request')->input('categories')!=null ? 'show' : '' }}"
                                aria-labelledby="categoryHeading" data-bs-parent="#categoryAccordion">
                                <div class="accordion-body">
                                    <form action="{{url('/')}}" method="get">

                                        {{-- display all filter categories here --}}
                                        <div class="form-check">
                                            <input class="form-check-input categories" type="checkbox" onChange="this.form.submit()" name="" value="" id="flexCheckDefault"
                                            {{ app('request')->input('categories')!=null ? in_array($c->category_name,app('request')->input('categories')) ? 'checked' : '' : ''}}>
                                            <label class="form-check-label" for="flexCheckDefault">
                                              [Category Name]
                                            </label>

                                        </div>
                                        {{-- end of display all filter categories --}}
                                    </form>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="product-list">
                <div class="d-flex flex-wrap">
                    {{-- display product --}}
                    <a href="" class="product-item">
                        <img src="{{asset('asset/1.png')}}" alt="" srcset="">
                        <div class="product-text">
                            Product Name
                        </div>
                        <div class="product-price">
                            $Product Price USD
                        </div>
                    </a>
                    {{-- end of display product --}}
                </div>
            </div>
        </div>
    </div>
@endsection
