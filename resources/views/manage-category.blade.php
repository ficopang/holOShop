@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table caption-top m-5">
            <caption>List of product categories</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                {{-- display all categories (EDIT and DELETE MODAL data-id must be filled with looped product object to trigger modal) --}}
                    <tr>
                        <th scope="row" class="fit">number</th>
                        <td class="fit">category id</td>
                        <td class="fit">category name</td>
                        <td class="fit">
                            <button type="button" class="btn btn-primary w-50 edit-category" data-bs-toggle="modal" data-bs-target="#editModal"
                            data-id="">
                                Edit
                            </button>

                        </td>
                        <td class="fit">
                            <button type="button" class="btn btn-danger w-50 delete-category" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="">Delete</button>

                        </td>
                    </tr>
                {{-- end of display all categories --}}
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
                    <form id="create-form" action="{{url('/manage/category/create')}}" method="post">
                    @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategory">Create Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <!-- Input Category Name -->
                                <input class="form-control" id="categoryName" name="category_name" value="{{old('category_name')}}" type="text" required>
                            </div>
                            @if ($errors->hasBag('insertCategory'))
                                <div class="alert alert-danger">
                                    {{$errors->insertCategory->first()}}
                                </div>
                                <script>
                                    $(function() {
                                        var editId=$('#product_id').val();
                                        $("#createModal").modal('show');
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
    {{-- Edit Modal --}}

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <form id="edit-form" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCategory">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="categoryId" class="form-label">Category ID</label>
                                <input class="form-control" id="categoryId" value="{{old('category_id')}}" name="category_id" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input class="form-control" id="categoryName" value="{{old('category_name')}}" name="category_name" type="text" required>
                            </div>
                            @if ($errors->hasBag('updateCategory'))
                                <div class="alert alert-danger">
                                    {{$errors->updateCategory->first()}}
                                </div>
                                <script>
                                    $(function() {
                                        var editId=$('#categoryId').val();
                                        $("#editModal").modal('show');
                                        $("#edit-form").attr('action','/manage/category/edit/'+editId);
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
                            <h5 class="modal-title" id="deleteCategory">Delete Category</h5>
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
            var editName=$(this).data('id').category_name;
            $(".modal-body #categoryId").val( editId );
            $(".modal-body #categoryName").val( editName );
            $("#edit-form").attr('action','/manage/category/edit/'+editId);
        });

        $('.delete-category').click(function(){
            var deleteId=$(this).data('id').id;
            $(".modal-body #deleteId").html("Delete data with ID "+ deleteId +" ?");
            $("#delete-form").attr('action','/manage/category/delete/'+deleteId);
        });

    </script>
@endsection
