@extends('admin.layout.app')
@section('content')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <title>KGF | Category List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($message = Session::get('success'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Category</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#create_modal">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped projects table-hover" id="category_list_table">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Icon</th>
                                <th class="text-nowrap">Category Name</th>
                                <th>Sub Title</th>
                                <th class="text-nowrap">Incharge</th>
                                <th class="text-right text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($category_list as $category)
                                <tr>
                                    <td class="text-nowrap">
                                        <img alt="Avatar" class="table-avatar" src="{{ $category->category_icon }}">
                                    </td>
                                    <td class="text-nowrap">{{ $category->category_name }}</td>
                                    <td>{{ $category->category_sub_title }}</td>
                                    <td class="text-nowrap">
                                        {{ $category->emp_name }}
                                        <br />
                                        <small>{{ $category->emp_designation . ', ' . $category->emp_division }}</small>
                                    </td>
                                    <td class="project-actions text-right text-nowrap">
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                            data-target="#update_modal" onclick="edit_func({{ $category->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs" onclick="show_delete_modal({{ $category->id }},'{{ $category->category_name }}')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">Nothing to show</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="create_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" type="text" name="category_name"
                                        placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input class="form-control" type="text" name="category_sub_title"
                                        placeholder="Sub Title">
                                </div>
                                <div class="form-group">
                                    <label>Incharge</label>
                                    <select class="form-control" name="category_incharge">
                                        <option selected disabled>Select Incharge</option>
                                        @forelse ($employee_list as $employee)
                                            <option value="{{ $employee->id }}">
                                                {{ $employee->emp_name . ', ' . $employee->emp_division }}</option>
                                        @empty
                                            <option value="0">Nothing to show</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Details</label>
                                    <textarea class="form-control" name="category_details" id="category_details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Category Icon</label>
                                    <input class="form-control" type="file" name="category_icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-category-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('POST') --}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input hidden class="form-control" type="text" name="id" id="id">
                                    <label>Category Name</label>
                                    <input class="form-control" type="text" name="category_name" id="category_name"
                                        placeholder="Category Name">
                                </div>
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input class="form-control" type="text" name="category_sub_title"
                                        id="category_sub_title" placeholder="Sub Title">
                                </div>
                                <div class="form-group">
                                    <label>Incharge</label>
                                    <select class="form-control" name="category_incharge" id="category_incharge">
                                        <option selected disabled>Select Incharge</option>
                                        @forelse ($employee_list as $employee)
                                            <option value="{{ $employee->id }}">
                                                {{ $employee->emp_name . ', ' . $employee->emp_division }}</option>
                                        @empty
                                            <option value="0">Nothing to show</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category Details</label>
                                    <textarea class="form-control" name="category_details" id="category_details_edit"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Category Icon</label>
                                    <input class="form-control" type="file" name="category_icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

        {{-- Delete Model Start --}}
        <div class="modal fade" id="delete_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <span>You're About To Delete <b><span id="categoryName"></span></b> Category</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                        <a id="confirmBtn" class="btn btn-danger">Confirm</a>
                    </div>
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- Delete Model End --}}

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            $('#category_list_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#category_details').summernote();
            $('#category_details_edit').summernote();
        });
    </script>

    <script>
        function edit_func(id) {
            $.ajax({
                url: "admin-settings-category-edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    console.log(response.category_name);
                    $('#id').val(response.id);
                    $('#category_name').val(response.category_name);
                    $('#category_sub_title').val(response.category_sub_title);
                    $('#category_incharge').val(response.category_incharge);
                    $('#category_details_edit').summernote('reset');
                    $('#category_details_edit').summernote('pasteHTML', response.category_details);
                }
            });
        }
        function show_delete_modal(id, name){
            $('#delete_modal').modal('show');
            document.getElementById('categoryName').innerHTML = name;
            $('#confirmBtn').attr('href', 'admin-settings-category-delete/'+id);
        }
    </script>
@endsection
