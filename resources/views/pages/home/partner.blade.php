@extends('admin.layout.app')
@section('content')
    <title>KGF | Partner List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Partner</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Partner</li>
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
                            <h5><i class="icon fas fa-check"></i>Global & Local Partners</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Partner List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#create_modal">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped projects text-nowrap table-hover" id="list_table">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($partner_list as $partner)
                                <tr>
                                    <td>
                                        <img alt="Avatar" class="table-avatar" src="{{ $partner->partner_logo }}">
                                    </td>
                                    <td>
                                        {{ $partner->partner_name }}
                                        <br />
                                        <small>{{ $partner->partner_type }}</small>
                                    </td>
                                    <td>
                                        @if ($partner->partner_status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                            data-target="#update_modal" onclick="partner_edit_func({{ $partner->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs"
                                            href="admin-home-partner-delete/{{ $partner->id }}">
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
            <form action="{{ route('admin-home-partner') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Partner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Partner Name</label>
                                    <input class="form-control" type="text" name="partner_name"
                                        placeholder="Partner Name" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>Partner Type</label>
                                    <select class="form-control" name="partner_type">
                                        <option value="Local">Local</option>
                                        <option value="Global">Global</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Partner Logo</label>
                                    <input class="form-control" type="file" name="partner_logo">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="partner_status">
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
    <div class="modal fade" id="update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-home-partner') }}" method="POST" enctype="multipart/form-data">
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
                                    <label>Partner Name</label>
                                    <input class="form-control" type="text" name="partner_name" id="partner_name"
                                        placeholder="Partner Name">
                                </div>
                                <input class="form-control" type="hidden" name="partner_id" id="partner_id">
                                <div class="form-group">
                                    <label>Partner Type</label>
                                    <select class="form-control" name="partner_type" id="partner_type">
                                        <option value="Local">Local</option>
                                        <option value="Global">Global</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Partner Logo</label>
                                    <input class="form-control" type="file" name="partner_logo">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="partner_status" id="partner_status">
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
            $('#list_table').DataTable({
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
        function partner_edit_func(partner_id) {
            $.ajax({
                url: 'admin-home-partner-edit/' + partner_id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#partner_id').val(response.id);
                    $('#partner_name').val(response.partner_name);
                    $('#partner_type').val(response.partner_type);
                    $('#partner_status').val(response.partner_status);
                }
            });
        }
    </script>
@endsection
