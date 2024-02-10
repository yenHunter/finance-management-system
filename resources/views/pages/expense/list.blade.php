@extends('layout.app')
@section('content')
    <title>Mohajon | Expense List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <a class="text-muted fw-light" href="{{ route('dashboard') }}">Dashboard </a>/ Expense List
        </h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="card-header header-elements">
                <h5 class="m-0 me-2">Expense List</h5>
                <div class="card-header-elements ms-auto">
                    <h6 class="m-0 me-2">Status</h6>
                    <select class="form-select form-select-sm w-auto me-2">
                        <option selected>All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                    <h6 class="m-0 me-2">Expense Head</h6>
                    <select class="form-select form-select-sm w-auto">
                        <option selected>All</option>
                        <option>Expense Head 1</option>
                        <option>Expense Head 2</option>
                        <option>Expense Head 3</option>
                        <option>Expense Head 4</option>
                        <option>Expense Head 5</option>
                    </select>
                    <a class="btn btn-sm btn-primary waves-effect waves-light" href="{{ route('income-create') }}">
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
                                <th>Expense Head</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>Expense Head 1</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>2023-24</small>
                                </td>
                                <td>100000</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 2</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>2023-24</small>
                                </td>
                                <td>100000</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 3</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>2023-24</small>
                                </td>
                                <td>100000</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 4</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>2023-24</small>
                                </td>
                                <td>100000</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Head 5</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>2023-24</small>
                                </td>
                                <td>100000</td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ti ti-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
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
            ordering: true
        });
    </script>
@endsection
