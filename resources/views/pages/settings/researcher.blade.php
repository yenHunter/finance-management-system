@extends('admin.layout.app')
@section('content')
    <title>KGF | Researcher List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Researcher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
                            <li class="breadcrumb-item active">Researcher</li>
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
                            <h5><i class="icon fas fa-check"></i> Researcher</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Researcher List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#researcher_modal">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">
                                    Image
                                </th>
                                <th style="width: 20%">
                                    Researcher
                                </th>
                                <th style="width: 20%">
                                    Organization
                                </th>
                                <th style="width: 15%" class="text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($researcher_list as $researcher)
                                <tr>
                                    <td><img alt="Avatar" class="table-avatar"
                                            src="{{ $researcher->researcher_picture }}"></td>
                                    <td>
                                        {{ $researcher->researcher_name }}
                                        <br />
                                        <small>{{ $researcher->researcher_designation }}</small>
                                    </td>
                                    <td>{{ $researcher->organization_name }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-primary btn-xs" href="#" >
                                            <i class="fas fa-folder"></i> View
                                        </a>
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                        data-target="#researcher_modal_update" onclick="edit_func({{ $researcher->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="show_delete_modal({{ $researcher->id }},'{{ $researcher->researcher_name }}')">
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
    {{-- Create Modal Start --}}
    <div class="modal fade" id="researcher_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-researcher') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Researcher</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Researcher Name</label>
                                    <input class="form-control" type="text" name="researcher_name"
                                        placeholder="Researcher Name">
                                </div>
                                <div class="form-group">
                                    <label>Researcher Designation</label>
                                    <input class="form-control" type="text" name="researcher_designation"
                                        placeholder="Researcher Designation">
                                </div>
                                <div class="form-group">
                                    <label>Researcher Designation</label>
                                    <select class="form-control" name="researcher_organization">
                                        @forelse ($organization_list as $organization)
                                            <option value="{{ $organization->id }}">{{ $organization->organization_name }}
                                            </option>
                                        @empty
                                            <option value="0">Nothing to show</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Profile Picture</label>
                                    <input class="form-control" type="file" name="researcher_picture">
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
    {{-- Create Modal End --}}

    {{-- Update Modal Start --}}
    <div class="modal fade" id="researcher_modal_update">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-researcher-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Researcher</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Researcher Name</label>
                                    <input hidden class="form-control" type="text" name="id" id="id">
                                    <input class="form-control" type="text" id="researcher_name" name="researcher_name"
                                        placeholder="Researcher Name">
                                </div>
                                <div class="form-group">
                                    <label>Researcher Designation</label>
                                    <input class="form-control" type="text" id="researcher_designation" name="researcher_designation"
                                        placeholder="Researcher Designation">
                                </div>
                                <div class="form-group">
                                    <label>Researcher Designation</label>
                                    <select class="form-control" id="researcher_organization" name="researcher_organization">
                                        @forelse ($organization_list as $organization)
                                            <option value="{{ $organization->id }}">{{ $organization->organization_name }}
                                            </option>
                                        @empty
                                            <option value="0">Nothing to show</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Profile Picture</label>
                                    <input class="form-control" type="file" name="researcher_picture">
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
    {{-- Update Modal End --}}

    {{-- Delete Model Start --}}
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Researcher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <span>You're About To Delete <b><span id="researcherName"></span></b> Researcher</span>
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

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        function edit_func(id) {
            $.ajax({
                url: "admin-settings-researcher-edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    console.log(response.researcher_name);
                    $('#id').val(response.id);
                    $('#researcher_name').val(response.researcher_name);
                    $('#researcher_designation').val(response.researcher_designation);
                    $('#researcher_organization').val(response.researcher_organization);
                }
            });
        }
        function show_delete_modal(id, name){
            $('#delete_modal').modal('show');
            document.getElementById('researcherName').innerHTML = name;
            $('#confirmBtn').attr('href', 'admin-settings-researcher-delete/'+id);
        }
    </script>
@endsection
