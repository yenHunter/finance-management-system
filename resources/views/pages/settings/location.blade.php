@extends('admin.layout.app')
@section('content')
    <title>KGF | Location List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Location</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
                            <li class="breadcrumb-item active">Location</li>
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
                            <h5><i class="icon fas fa-check"></i> Location</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Location List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#location_modal">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 20%">
                                    Division
                                </th>
                                <th style="width: 40%">
                                    District
                                </th>
                                <th style="width: 15%" class="text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($location_list as $location)
                                <tr>
                                    <td>{{ $location->division }}</td>
                                    <td>{{ $location->district }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-warning btn-xs" href="#" data-toggle="modal"
                                        data-target="#location_update_modal" onclick="edit_func({{ $location->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="show_delete_modal({{ $location->id }},'{{ $location->district }}')">
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
    {{-- Location Create Modal Start --}}
    <div class="modal fade" id="location_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-location') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Division Name</label>
                                    <select class="form-control" name="division">
                                        <option selected disabled>Select Division</option>
                                        <option>Barisal</option>
                                        <option>Chittagong</option>
                                        <option>Dhaka</option>
                                        <option>Khulna</option>
                                        <option>Mymensingh</option>
                                        <option>Rajshahi</option>
                                        <option>Rangpur</option>
                                        <option>Sylhet</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>District Name</label>
                                    <input class="form-control" type="text" name="district"
                                        placeholder="District Name">
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
    {{-- Location Create Modal End --}}

    {{-- Location Update Modal Start --}}
    <div class="modal fade" id="location_update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-location-update') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input hidden type="text" name="id" id="id">
                                    <label>Division Name</label>
                                    <select class="form-control" id="division" name="division">
                                        <option selected disabled>Select Division</option>
                                        <option>Barisal</option>
                                        <option>Chittagong</option>
                                        <option>Dhaka</option>
                                        <option>Khulna</option>
                                        <option>Mymensingh</option>
                                        <option>Rajshahi</option>
                                        <option>Rangpur</option>
                                        <option>Sylhet</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>District Name</label>
                                    <input class="form-control" type="text" id="district" name="district"
                                        placeholder="District Name">
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
    {{-- Location Update Modal End --}}

    {{-- Location Delete Modal Start --}}
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Location</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <span>You're About To Delete <b><span id="districtName"></span></b> District</span>
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
    {{-- Location Delete Modal End --}}
    <script>
        function edit_func(id) {
            $.ajax({
                url: "admin-settings-location-edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    console.log(response.category_name);
                    $('#id').val(response.id);
                    $('#division').val(response.division);
                    $('#district').val(response.district);
                }
            });
        }
        function show_delete_modal(id, name){
            $('#delete_modal').modal('show');
            document.getElementById('districtName').innerHTML = name;
            $('#confirmBtn').attr('href', 'admin-settings-location-delete/'+id);
        }
    </script>
@endsection
