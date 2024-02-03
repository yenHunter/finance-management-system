@extends('admin.layout.app')
@section('content')
    <title>KGF | Slider List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slider</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Home Page</a></li>
                            <li class="breadcrumb-item active">Slider</li>
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
                            <h5><i class="icon fas fa-check"></i> Slider</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Slider List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#slider_create_modal">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped projects text-nowrap table-hover" id="slider_list_table">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Slider Title</th>
                                <th>Status</th>
                                {{-- <th class="text-right">Sequence</th> --}}
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($slider_list as $slider)
                                <tr>
                                    <td>
                                        <img alt="Avatar" width="100px" src="{{ asset($slider->slider_image) }}">
                                    </td>
                                    <td>
                                        {{ $slider->slider_title }}
                                        <br />
                                        <small>{{ $slider->slider_event_date }}</small>
                                    </td>
                                    <td>
                                        @if ($slider->slider_status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    {{-- <td class="text-right">
                                        <a class="btn btn-outline-info btn-xs" href="#">Move <i
                                                class="fas fa-caret-square-up"></i></a>
                                        <a class="btn btn-outline-info btn-xs" href="#">Move <i
                                                class="fas fa-caret-square-down"></i></a>
                                    </td> --}}
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                        data-target="#slider_update_modal" onclick="edit_func({{ $slider->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="show_delete_modal({{ $slider->id }},'{{ $slider->slider_title }}')">
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

    {{-- Slider Create Modal Start --}}
    <div class="modal fade" id="slider_create_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-home-slider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Slider</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Slider Title</label>
                                    <input class="form-control" type="text" name="slider_title"
                                        placeholder="Slider Title">
                                </div>
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input class="form-control" type="date" name="slider_event_date">
                                </div>
                                <div class="form-group">
                                    <label>Event Location/Venue</label>
                                    <input class="form-control" type="text" name="slider_location"
                                        placeholder="Event Location/Venue">
                                </div>
                                <div class="form-group">
                                    <label>Slider Picture</label>
                                    <input class="form-control" type="file" name="slider_image">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="slider_status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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
    {{-- Slider Create Modal End --}}

    {{-- Slider Edit Modal Start --}}
    <div class="modal fade" id="slider_update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-home-slider-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Slider</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Slider Title</label>
                                    <input hidden class="form-control" type="text" name="id" id="id">
                                    <input class="form-control" type="text" id="slider_title" name="slider_title"
                                        placeholder="Slider Title">
                                </div>
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input class="form-control" type="date" id="slider_event_date" name="slider_event_date">
                                </div>
                                <div class="form-group">
                                    <label>Event Location/Venue</label>
                                    <input class="form-control" type="text" id="slider_location" name="slider_location"
                                        placeholder="Event Location/Venue">
                                </div>
                                <div class="form-group">
                                    <label>Slider Picture</label>
                                    <input class="form-control" type="file" name="slider_image">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="slider_status" name="slider_status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- Slider Edit Modal End --}}

    {{-- Delete Model Start --}}
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Slider</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <span>You're About To Delete <b><span id="sliderTitleName"></span></b> Slider</span>
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

    <script>
        $(function() {
            $('#slider_list_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        function edit_func(id) {
            $.ajax({
                url: "admin-home-slider-edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.id);
                    $('#slider_title').val(response.slider_title);
                    $('#slider_event_date').val(response.slider_event_date);
                    $('#slider_location').val(response.slider_location);
                    $('#slider_status').val(response.slider_status);
                }
            });
        }
        function show_delete_modal(id, name){
            $('#delete_modal').modal('show');
            document.getElementById('sliderTitleName').innerHTML = name;
            $('#confirmBtn').attr('href', 'admin-home-slider-delete/'+id);
        }
    </script>
@endsection
