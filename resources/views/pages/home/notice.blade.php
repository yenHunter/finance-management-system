@extends('admin.layout.app')
@section('content')
    <title>KGF | Notice List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Notice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Notice</li>
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
                            <h5><i class="icon fas fa-check"></i>Notice Board</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Notice List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#notice_create_modal">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped projects text-nowrap table-hover" id="slider_list_table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($notice_list as $notice)
                                <tr>
                                    <td>
                                        {{ $notice->notice_title }}
                                        <br />
                                        <small>{{ $notice->notice_date }}</small>
                                    </td>
                                    <td>
                                        @if ($notice->notice_status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                            data-target="#notice_update_modal"
                                            onclick="notice_edit_func({{ $notice->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs"
                                            href="admin-home-notice-delete/{{ $notice->id }}">
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

    <div class="modal fade" id="notice_create_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-home-notice') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Notice</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notice Title</label>
                                    <input class="form-control" type="text" name="notice_title"
                                        placeholder="Notice Title" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>Notice Date</label>
                                    <input class="form-control" type="date" name="notice_date">
                                </div>
                                <div class="form-group">
                                    <label>Notice File</label>
                                    <input class="form-control" type="file" name="notice_file">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="notice_status">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="notice_update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-home-notice') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Notice</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Notice Title</label>
                                    <input class="form-control" type="text" name="notice_title" id="notice_title"
                                        placeholder="Notice Title">
                                </div>
                                <input class="form-control" type="hidden" name="notice_id" id="notice_id">
                                <div class="form-group">
                                    <label>Notice Date</label>
                                    <input class="form-control" type="date" name="notice_date" id="notice_date">
                                </div>
                                <div class="form-group">
                                    <label>Notice File</label>
                                    <input class="form-control" type="file" name="notice_file">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="notice_status" id="notice_status">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

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
        function notice_edit_func(notice_id) {
            $.ajax({
                url: 'admin-home-notice-edit/' + notice_id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#notice_id').val(response.id);
                    $('#notice_title').val(response.notice_title);
                    $('#notice_date').val(response.notice_date);
                    $('#notice_status').val(response.notice_status);
                }
            });
        }
    </script>
@endsection
