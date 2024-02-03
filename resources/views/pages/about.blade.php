@extends('admin.layout.app')
@section('content')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <title>KGF | About</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>About</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">About</li>
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
                            <h5><i class="icon fas fa-check"></i>About</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            @foreach ($about as $item)
                @if ($item->column_title == 'mission' || $item->column_title == 'vision')
                    <div class="card bg-success shadow">
                        <div class="card-header">
                            <h3 class="card-title">{{ $item->column_name }}</h3>
                        </div>
                        <div class="card-body">
                            {!! $item->column_value !!}
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#update_modal"
                                onclick="edit_func({{ $item->id }})"><i class="fas fa-pencil-alt"></i> Edit</a>
                        </div>
                    </div>
                @else
                    <div class="card card-info shadow">
                        <div class="card-header">
                            <h3 class="card-title">{{ $item->column_name }}</h3>
                        </div>
                        <div class="card-body">
                            {!! $item->column_value !!}
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#update_modal"
                                onclick="edit_func({{ $item->id }})"><i class="fas fa-pencil-alt"></i> Edit</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-about') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label id="column_name"></label>
                                    <textarea class="form-control" name="column_value" id="column_value"></textarea>
                                </div>
                                <input class="form-control" type="hidden" name="id" id="id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script>
        $(function() {
            // Summernote
            $('#column_value').summernote()
        })
    </script>

    <script>
        function edit_func(id) {
            $.ajax({
                url: 'admin-about-edit/' + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.id);
                    $('#modal_title').text('Update ' + response.column_name);
                    $('#column_name').text(response.column_name);
                    $('#column_value').summernote('reset');
                    if (response.id == 7 || response.id == 8) {
                        $('#column_value').summernote('backColor', 'red');
                    }
                    $('#column_value').summernote('pasteHTML', response.column_value);
                }
            });
        }
    </script>
@endsection
