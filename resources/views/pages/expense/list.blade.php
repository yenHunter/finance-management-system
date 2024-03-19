@extends('layout.app')
@section('content')
    <title>Mohajon | Expense List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <a class="text-muted fw-light" href="{{ route('dashboard') }}">Dashboard </a>/ Expense List
        </h4>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible d-flex align-items-baseline" role="alert">
                <span class="alert-icon alert-icon-lg text-success me-2">
                    <i class="ti ti-check ti-sm"></i>
                </span>
                <div class="d-flex flex-column ps-1">
                    <h5 class="alert-heading mb-2">Expense Details</h5>
                    <p class="mb-0">{{ $message }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
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
                        @foreach ($expense_head as $item)
                            <option value="{{ $item->id }}">{{ $item->head_name }}</option>
                        @endforeach
                    </select>
                    <a class="btn btn-sm btn-primary waves-effect waves-light" href="{{ route('expense-create') }}">
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
                            @foreach ($expense_list as $item)
                                <tr>
                                    <td>{{ $item->head_name }}</td>
                                    <td>
                                        <small>{{ $item->value }}</small><br />
                                        <small>{{ date_format(date_create($item->date),'d M, Y') }}</small>
                                    </td>
                                    <td>{{ $item->amount }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-label-primary me-1">Active</span>
                                        @else
                                            <span class="badge bg-label-warning me-1">Active</span>
                                        @endif
                                    </td>
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
                            @endforeach
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
