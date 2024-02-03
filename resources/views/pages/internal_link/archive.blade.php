@extends('admin.layout.app')
@section('content')
    <title>KGF | Archive List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Archive</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Archive</li>
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
                            <h5><i class="icon fas fa-check"></i>Archive</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Archive List</h3>
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
                                <th>Title</th>
                                <th>Category</th>
                                <th>View</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($archive as $item)
                                <tr>
                                    <td>
                                        {{ $item->title }}
                                        <br />
                                        <small>{{ date_format(date_create($item->archive_date), 'd-M-Y') }}</small>
                                    </td>
                                    <td>
                                        {{ $item->category }}
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
                                            href="admin-archive-delete/{{ $item->id }}">
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
            <form action="{{ route('admin-archive') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Archive</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <textarea class="form-control" name="title" placeholder="Title"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Archive Date</label>
                                    <input class="form-control" type="date" name="archive_date"
                                        placeholder="Archive Date">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="Journal">Journal</option>
                                        <option value="Other">Other</option>
                                    </select>
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
            <form action="{{ route('admin-archive') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Archive</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control" type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label>Title</label>
                                    <textarea class="form-control" name="title" id="title" placeholder="Title"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Archive Date</label>
                                    <input class="form-control" type="date" name="archive_date" id="archive_date"
                                        placeholder="Archive Date">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="Journal">Journal</option>
                                        <option value="Other">Other</option>
                                    </select>
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
                url: 'admin-archive-edit/' + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.id);
                    $('#title').val(response.title);
                    $('#archive_date').val(response.archive_date);
                    $('#category').val(response.category);
                    $('#status').val(response.status);
                }
            });
        }
    </script>
@endsection
