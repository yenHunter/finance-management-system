@extends('admin.layout.app')
@section('content')
    <title>KGF | Projukti Barta List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projukti Barta</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Projukti Barta</li>
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
                            <h5><i class="icon fas fa-check"></i>Projukti Barta</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Projukti Barta List</h3>
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
                                <th>Number</th>
                                <th>Title</th>
                                <th>View</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projukti_barta as $item)
                                <tr>
                                    <td>
                                        {{ $item->number }}
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                        <br />
                                        <small>{{ $item->year }}</small>
                                    </td>
                                    <td>
                                        <a href="{{ asset($item->file_path) }}" target="_blank"
                                            class="btn btn-outline-info btn-xs"><i class="fas fa-file-alt"></i> View</a>
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                            data-target="#update_modal" onclick="edit_func({{ $item->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs"
                                            href="admin-projukti-barta-delete/{{ $item->id }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">Nothing to show</td>
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
            <form action="{{ route('admin-projukti-barta') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Projukti Barta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Number</label>
                                    <input class="form-control" type="text" name="number" placeholder="Number"
                                        maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <textarea class="form-control" name="title" placeholder="Title"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input class="form-control" type="text" name="year"
                                        placeholder="Year">
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input class="form-control" type="file" name="file_path">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
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
            <form action="{{ route('admin-projukti-barta') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Projukti Barta</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Number</label>
                                    <input class="form-control" type="text" name="number" id="number"
                                        placeholder="Number">
                                </div>
                                <input class="form-control" type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label>Title</label>
                                    <textarea class="form-control" name="title" id="title" placeholder="Title"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input class="form-control" type="text" name="year" id="year"
                                        placeholder="Year">
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input class="form-control" type="file" name="file_path">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
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
        function edit_func(id) {
            $.ajax({
                url: 'admin-projukti-barta-edit/' + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.id);
                    $('#number').val(response.number);
                    $('#title').val(response.title);
                    $('#year').val(response.year);
                    $('#status').val(response.status);
                }
            });
        }
    </script>
@endsection
