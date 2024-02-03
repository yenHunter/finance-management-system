@extends('admin.layout.app')
@section('content')
    <title>KGF | Project Completion Report List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project Completion Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Project Completion Report</li>
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
                            <h5><i class="icon fas fa-check"></i>Project Completion Report</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Project Completion Report List</h3>
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
                                <th>Project Code & PCR Title</th>
                                <th>Project Type</th>
                                <th>View</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($project_completion_report as $item)
                                <tr>
                                    <td>
                                        {{ $item->project_code }}
                                        <br />
                                        <small>{{ $item->pcr_title }}</small>
                                    </td>
                                    <td>
                                        {{ $item->project_type }}
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
                                            href="admin-report-project-completion-report-delete/{{ $item->id }}">
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
            <form action="{{ route('admin-report-project-completion-report') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Annual Work Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Project Code</label>
                                    <input class="form-control" type="text" name="project_code"
                                        placeholder="Project Code" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>PCR Title</label>
                                    <textarea class="form-control" name="pcr_title" placeholder="PCR Title"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Project Type</label>
                                    <select class="form-control" name="project_type">
                                        <option value="0" selected disabled>Select Type</option>
                                        <option>Basic Research Project</option>
                                        <option>KGF Bkget CGP Project</option>
                                        <option>Tech. Pilot Research Project</option>
                                        <option>Commission Research Project</option>
                                        <option>Capacity Enhancement Project</option>
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
            <form action="{{ route('admin-report-project-completion-report') }}" method="POST"
                enctype="multipart/form-data">
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
                                    <label>Project Code</label>
                                    <input class="form-control" type="text" name="project_code" id="project_code"
                                        placeholder="Project Code">
                                </div>
                                <input class="form-control" type="hidden" name="id" id="id">
                                <div class="form-group">
                                    <label>PCR Title</label>
                                    <textarea class="form-control" name="pcr_title" id="pcr_title" placeholder="PCR Title"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Project Type</label>
                                    <select class="form-control" name="project_type" id="project_type">
                                        <option value="0" selected disabled>Select Type</option>
                                        @foreach ($project_type as $item)
                                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                                        @endforeach
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
                url: 'admin-report-project-completion-report-edit/' + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.id);
                    $('#project_code').val(response.project_code);
                    $('#pcr_title').val(response.pcr_title);
                    $('#project_type').val(response.project_type);
                    $('#status').val(response.status);
                }
            });
        }
    </script>
@endsection
