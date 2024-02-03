@extends('admin.layout.app')
@section('content')
    <title>KGF | General Body</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Body List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
                            <li class="breadcrumb-item active">General Body</li>
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
                            <h5><i class="icon fas fa-check"></i> General Body</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">General Body List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-xs btn-outline-success" data-toggle="modal"
                            data-target="#employee_modal">
                            <i class="fas fa-plus"></i> Create
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped projects text-nowrap table-hover" id="employee_table">
                        <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Member Name</th>
                                <th>Designation</th>
                                <th class="text-right">Status</th>
                                {{-- <th class="text-right">Sequence</th> --}}
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employee_list as $employee)
                                <tr>
                                    <td>
                                        <img alt="Avatar" class="table-avatar" src="{{ $employee->emp_picture }}">
                                    </td>
                                    <td>
                                        {{ $employee->emp_name }}
                                        <br />
                                        <small>{{ $employee->emp_mobile }}, {{ $employee->emp_email }}</small>
                                    </td>
                                    <td>
                                        {{ $employee->emp_designation }}
                                        <br />
                                        <small>{{ $employee->emp_division }}</small>
                                    </td>
                                    <td class="text-center">
                                        @if ($employee->emp_status == 1)
                                            <span class="badge badge-success">Current</span>
                                        @else
                                            <span class="badge badge-danger">Former</span>
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
                                        data-target="#employee_update_modal" onclick="edit_func({{ $employee->id }})">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-outline-danger btn-xs" href="#" onclick="show_delete_modal({{ $employee->id }},'{{ $employee->emp_name }}')">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Nothing to show</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="employee_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create General Body</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <input class="form-control" type="text" name="emp_name" placeholder="Employee Name">
                                </div>
                                <div class="form-group">
                                    <label>Designation Name</label>
                                    <input class="form-control" type="text" name="emp_designation"
                                        placeholder="Designation Name">
                                </div>
                                <div class="form-group">
                                    <label>Division Name</label>
                                    <input class="form-control" type="text" name="emp_division"
                                        placeholder="Division Name">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="hidden" name="emp_type" value="1">
                                    <select class="form-control" name="emp_status" onchange="to_date_enable(this.value)">
                                        <option value="1">Current</option>
                                        <option value="0">Former</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>From</label>
                                    <input class="form-control" type="date" name="emp_from_date">
                                </div>
                                <div class="form-group">
                                    <label>To</label>
                                    <input class="form-control" type="date" name="emp_to_date" id="emp_to_date"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control" type="text" name="emp_telephone"
                                        placeholder="Telephone">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="text" name="emp_mobile" placeholder="Mobile">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="emp_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" name="emp_details" placeholder="Details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input class="form-control" type="file" name="emp_picture">
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

    {{-- Employee Edit Modal Start --}}
    <div class="modal fade" id="employee_update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-settings-employee-update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update General Body</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Employee Name</label>
                                    <input hidden class="form-control" type="text" name="id" id="id">
                                    <input class="form-control" type="text" id="emp_name" name="emp_name" placeholder="Employee Name">
                                </div>
                                <div class="form-group">
                                    <label>Designation Name</label>
                                    <input class="form-control" type="text" id="emp_designation" name="emp_designation"
                                        placeholder="Designation Name">
                                </div>
                                <div class="form-group">
                                    <label>Division Name</label>
                                    <input class="form-control" type="text" id="emp_division" name="emp_division"
                                        placeholder="Division Name">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="hidden" name="emp_type" value="3">
                                    <select class="form-control" id="emp_status" name="emp_status" onchange="to_date_enable(this.value)">
                                        <option value="1">Current</option>
                                        <option value="0">Former</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>From</label>
                                    <input class="form-control" type="date" id="emp_from_date" name="emp_from_date">
                                </div>
                                <div class="form-group">
                                    <label>To</label>
                                    <input class="form-control" type="date" id="emp_to_date" name="emp_to_date" id="emp_to_date"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input class="form-control" type="text" id="emp_telephone" name="emp_telephone"
                                        placeholder="Telephone">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="text" id="emp_mobile" name="emp_mobile" placeholder="Mobile">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" id="emp_email" name="emp_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" id="emp_details" name="emp_details" placeholder="Details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input class="form-control" type="file" name="emp_picture">
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
    {{-- Employee Edit Modal End --}}

    {{-- Delete Model Start --}}
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete General Body</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <span>You're About To Delete <b><span id="employeeName"></span></b> General Body</span>
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
        $(function () {
          $('#employee_table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>

    <script>
        function to_date_enable(value) {
            if (value == 1) {
                $('#emp_to_date').prop('disabled', true);
            } else {
                $('#emp_to_date').prop('disabled', false);
            }
        }
    </script>
    <script>
        function edit_func(id) {
            $.ajax({
                url: "admin-settings-employee-edit/" + id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    console.log(response.emp_name);
                    $('#id').val(response.id);
                    $('#emp_name').val(response.emp_name);
                    $('#emp_designation').val(response.emp_designation);
                    $('#emp_division').val(response.emp_division);
                    $('#emp_type').val(response.emp_type);
                    $('#emp_status').val(response.emp_status);
                    $('#emp_from_date').val(response.emp_from_date);
                    $('#emp_to_date').val(response.emp_to_date);
                    $('#emp_telephone').val(response.emp_telephone);
                    $('#emp_mobile').val(response.emp_mobile);
                    $('#emp_email').val(response.emp_email);
                    $('#emp_details').val(response.emp_details);
                }
            });
        }
        function show_delete_modal(id, name){
            $('#delete_modal').modal('show');
            document.getElementById('employeeName').innerHTML = name;
            $('#confirmBtn').attr('href', 'admin-settings-employee-delete/'+id);
        }
    </script>
@endsection
