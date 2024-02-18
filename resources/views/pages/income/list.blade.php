@extends('layout.app')
@section('content')
    <title>Mohajon | Income List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <a class="text-muted fw-light" href="{{ route('dashboard') }}">Dashboard </a>/ Income List
        </h4>

        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="card-header header-elements">
                <h5 class="m-0 me-2">Income List</h5>
                <div class="card-header-elements ms-auto">
                    <h6 class="m-0 me-2">Status</h6>
                    <select class="form-select form-select-sm w-auto me-2">
                        <option selected>All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                    <h6 class="m-0 me-2">Fund Type</h6>
                    <select class="form-select form-select-sm w-auto">
                        <option selected>All</option>
                        <option>Endowment Trust</option>
                        <option>BKGET Fund</option>
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
                                <th>Bank</th>
                                <th>FDR No</th>
                                <th>Duration</th>
                                <th>Amount</th>
                                <th>Maturity value</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/img/banks/city-bank.jpg') }}" alt="Avatar"
                                                class="rounded-circle" width="40px" />
                                        </div>
                                        <div class="col-10">
                                            <strong class="ms-2">City Bank</strong><br>
                                            <small class="ms-2">Farmgate Branch</small>
                                        </div>
                                    </div>
                                </td>
                                <td>3560078</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>01 January, 2024</small>
                                </td>
                                <td>10000000</td>
                                <td>70000000</td>
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
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/img/banks/dbbl.jpg') }}" alt="Avatar"
                                                class="rounded-circle" width="40px" />
                                        </div>
                                        <div class="col-10">
                                            <strong class="ms-2">Dutch Bangla Bank Limited</strong><br>
                                            <small class="ms-2">Farmgate Branch</small>
                                        </div>
                                    </div>
                                </td>
                                <td>3560078</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>01 January, 2024</small>
                                </td>
                                <td>10000000</td>
                                <td>70000000</td>
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
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/img/banks/islami-bank.jpg') }}" alt="Avatar"
                                                class="rounded-circle" width="40px" />
                                        </div>
                                        <div class="col-10">
                                            <strong class="ms-2">Islami Bank Bangladesh Ltd</strong><br>
                                            <small class="ms-2">Farmgate Branch</small>
                                        </div>
                                    </div>
                                </td>
                                <td>3560078</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>01 January, 2024</small>
                                </td>
                                <td>10000000</td>
                                <td>70000000</td>
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
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/img/banks/ab-bank.jpg') }}" alt="Avatar"
                                                class="rounded-circle" width="40px" />
                                        </div>
                                        <div class="col-10">
                                            <strong class="ms-2">AB Bank</strong><br>
                                            <small class="ms-2">Farmgate Branch</small>
                                        </div>
                                    </div>
                                </td>
                                <td>3560078</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>01 January, 2024</small>
                                </td>
                                <td>10000000</td>
                                <td>70000000</td>
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
                                <td>
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('assets/img/banks/sonali-bank.jpg') }}" alt="Avatar"
                                                class="rounded-circle" width="40px" />
                                        </div>
                                        <div class="col-10">
                                            <strong class="ms-2">Sonali Bank Limited</strong><br>
                                            <small class="ms-2">Farmgate Branch</small>
                                        </div>
                                    </div>
                                </td>
                                <td>3560078</td>
                                <td>
                                    <small>01 January, 2023</small><br />
                                    <small>01 January, 2024</small>
                                </td>
                                <td>10000000</td>
                                <td>70000000</td>
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
