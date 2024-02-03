@extends('admin.layout.app')
@section('content')
    <title>KGF | Organization List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Organization</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
                            <li class="breadcrumb-item active">Organization</li>
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
                            <h5><i class="icon fas fa-check"></i> Organization</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Organization List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#organization_modal">
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
                                <th style="width: 40%">
                                    Organization
                                </th>
                                <th style="width: 15%" class="text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($organization_list as $organization)
                                <tr>
                                    <td><img alt="Avatar" class="table-avatar"
                                            src="{{ $organization->organization_logo }}"></td>
                                    <td>
                                        {{ $organization->organization_name }}
                                        <br />
                                        <small>{{ $organization->organization_code }}</small>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-primary btn-xs" href="#">
                                            <i class="fas fa-folder"></i> View
                                        </a>
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                        data-target="#update_modal" onclick="edit_func({{ $organization->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="show_delete_modal({{ $organization->id }},'{{ $organization->organization_name }}')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">Nothing to show</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="organization_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-organization') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Organization</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Organization Name</label>
                                    <input class="form-control" type="text" name="organization_name"
                                        placeholder="Organization Name">
                                </div>
                                <div class="form-group">
                                    <label>Organization Code</label>
                                    <input class="form-control" type="text" name="organization_code"
                                        placeholder="Organization Code">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="organization_address" placeholder="Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Organization Logo</label>
                                    <input class="form-control" type="file" name="organization_logo">
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

    {{-- Edit Modal Start --}}
    <div class="modal fade" id="update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-organization-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Organization</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Organization Name</label>
                                    <input hidden class="form-control" type="text" name="id" id="id">
                                    <input class="form-control" type="text" id="organization_name" name="organization_name"
                                        placeholder="Organization Name">
                                </div>
                                <div class="form-group">
                                    <label>Organization Code</label>
                                    <input class="form-control" type="text" id="organization_code" name="organization_code"
                                        placeholder="Organization Code">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="organization_address" name="organization_address" placeholder="Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Organization Logo</label>
                                    <input class="form-control" type="file" name="organization_logo">
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
    {{-- Edit Modal End --}}

    {{-- Delete Model Start --}}
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Organization</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <span>You're About To Delete <b><span id="organizationName"></span></b> Organization</span>
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
                url: "admin-settings-organization-edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    console.log(response.organization_name);
                    $('#id').val(response.id);
                    $('#organization_name').val(response.organization_name);
                    $('#organization_code').val(response.organization_code);
                    $('#organization_address').val(response.organization_address);
                }
            });
        }
        function show_delete_modal(id, name){
            $('#delete_modal').modal('show');
            document.getElementById('organizationName').innerHTML = name;
            $('#confirmBtn').attr('href', 'admin-settings-organization-delete/'+id);
        }
    </script>
@endsection
