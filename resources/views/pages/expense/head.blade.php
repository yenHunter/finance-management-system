@extends('layout.app')
@section('content')
    <title>Mohajon | Income List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <a class="text-muted fw-light" href="{{ route('dashboard') }}">Dashboard </a>/ Bank List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="card-header header-elements">
                <h5 class="card-title">Bank List</h5>
                <div class="card-header-elements ms-auto">
                    <a class="btn btn-sm btn-primary waves-effect waves-light" href="#" data-bs-toggle="modal"
                        data-bs-target="#largeModal">
                        <span class="tf-icon ti ti-plus ti-sm me-1"></span>
                        Create
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>Expense Head 1</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <a class="text-danger" href="javascript:void(0);"><i class="ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 2</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <a class="text-danger" href="javascript:void(0);"><i class="ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 3</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <a class="text-danger" href="javascript:void(0);"><i class="ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 4</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <a class="text-danger" href="javascript:void(0);"><i class="ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 5</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <a class="text-danger" href="javascript:void(0);"><i class="ti ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add Bank Records</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-2">
                            <label for="nameLarge" class="form-label me-2">Name</label>
                            <span class="badge badge-center rounded-pill bg-label-danger"><i class="ti ti-star"></i></span>
                            <input type="text" id="nameLarge" name="bank_name" class="form-control"
                                placeholder="Enter Bank Name" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailLarge" class="form-label">Branch Code</label>
                            <input type="text" id="emailLarge" name="branch_code" class="form-control"
                                placeholder="Enter Branch Code" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobLarge" class="form-label">Swift Code</label>
                            <input type="text" id="dobLarge" name="swift_code" class="form-control"
                                placeholder="Swift Code" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <label for="nameLarge" class="form-label me-2">Branch Name</label>
                            <span class="badge badge-center rounded-pill bg-label-danger"><i
                                    class="ti ti-star"></i></span>
                            <input type="text" id="nameLarge" name="branch_name" class="form-control"
                                placeholder="Enter Branch Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <label for="nameLarge" class="form-label me-2">Branch Address</label>
                            <textarea class="form-control" name="address" placeholder="Branch Address"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <label for="nameLarge" class="form-label me-2">Bank Logo</label>
                            <input type="file" id="nameLarge" name="logo" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-2">
                            <label for="nameLarge" class="form-label me-2">Bank Logo</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $('#table').DataTable({
            paging: true,
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: false
        });
    </script>
@endsection
