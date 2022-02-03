@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table caption-top m-3">
            <caption>List of product</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                {{-- display all product (EDIT and DELETE MODAL data-id must be filled with looped product object to trigger modal) --}}
                <tr>
                    <th scope="row" class="fit">number</th>
                    <td class="fit">product id</td>
                    <td class="fit">product name</td>
                    <td class="fit">category name</td>
                    <td class="fit">
                        <img src="{{asset('asset/1.png')}}" >
                    </td>
                    <td class="fit">product price</td>
                    <td class="fit">
                        <button type="button" class="btn btn-primary w-100 edit-category" data-bs-toggle="modal" data-bs-target="#editModal"
                        data-id="">
                            Edit
                        </button>

                    </td>
                    <td class="fit">
                        <button type="button" class="btn btn-danger w-100 delete-category" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" data-id="">Delete</button>

                    </td>
                </tr>
                {{-- end of display product --}}
            </tbody>
        </table>
    </div>
    <div class="d-flex">
        <button type="button" class="btn btn-primary w-100 create-category" data-bs-toggle="modal" data-bs-target="#createModal">
            Create
        </button>
    </div>
    {{-- Create Modal --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <form id="create-form" action="{{url('/manage/product/create')}}"  enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategory">Create Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input class="form-control" id="productName" name="product_name" value="{{old('product_name')}}" type="text" required>
                            </div>
                            <div class="mb-3">
                                <label for="categorySelect" class="form-label">Category</label>
                                <select class="form-select" id="categorySelect" name="category_id" value="{{old('category_id')}}">
                                    {{-- display all categories --}}
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    {{-- end of display categories --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Choose Product Image</label>
                                <input class="form-control" type="file" id="productImage" name="product_image">
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" name="product_price"  value="{{old('product_price')}}" step=".01" required>
                            </div>
                            @if ($errors->hasBag('insertProduct'))
                                <div class="alert alert-danger">
                                    {{$errors->insertProduct->first()}}
                                </div>
                                <script>
                                    $(function() {
                                        $("#createModal").modal('show');

                                    });
                                </script>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
    {{-- Edit Modal --}}

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <form id="edit-form" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategory">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="productId" class="form-label">Product ID</label>
                                <input class="form-control" id="productId" type="text" name="product_id" value="{{old('product_id')}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input class="form-control" id="productName" name="product_name" value="{{old('product_name')}}" type="text" required>
                            </div>
                            <div class="mb-3">
                                <label for="categorySelect" class="form-label">Category</label>
                                <select class="form-select" id="categorySelect" name="category_id" value="{{old('category_id')}}">
                                    {{-- display all categories --}}
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    {{-- end of display categories --}}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Choose Product Image</label>
                                <input class="form-control" type="file" id="productImage" name="product_image">
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" name="product_price" value="{{old('product_price')}}" step=".01" required>
                            </div>
                            @if ($errors->hasBag('updateProduct'))
                                <div class="alert alert-danger">
                                    {{$errors->updateProduct->first()}}
                                </div>
                                <script>
                                    $(function() {
                                        var editId=$('#productId').val();
                                        $("#editModal").modal('show');
                                        $("#edit-form").attr('action','/manage/product/edit/'+editId);
                                        $("#edit-form").attr('enctype','multipart/form-data');
                                    });
                                </script>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <form id="delete-form" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteCategory">Delete Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" id="deleteId">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <script>

        $('.edit-category').click(function(){
            var editId=$(this).data('id').id;
            var editName=$(this).data('id').product_name;
            var categoryId=$(this).data('id').category_id;
            var editPrice=$(this).data('id').product_price;
            $(".modal-body #productId").val( editId );
            $(".modal-body #productName").val( editName );
            $(".modal-body #categorySelect").val(categoryId);
            $(".modal-body #productPrice").val( editPrice );
            $("#edit-form").attr('action','/manage/product/edit/'+editId);
            $("#edit-form").attr('enctype','multipart/form-data');
        });

        $('.delete-category').click(function(){
            var deleteId=$(this).data('id').id;
            $(".modal-body #deleteId").html("Delete data with ID "+ deleteId +" ?");
            $("#delete-form").attr('action','/manage/product/delete/'+deleteId);
        });

        var editModal = document.getElementById('editModal')
        editModal.addEventListener('hidden.bs.modal', function (event) {
            editModal.getElementsByClassName('alert')[0].style.display="none";
        })
    </script>
@endsection
