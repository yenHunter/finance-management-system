@extends('layout.app')
@section('content')
    <title>
        Mohajon | Reports</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <a class="text-muted fw-light" href="{{ route('dashboard') }}">Dashboard </a>/ Reports
        </h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="card-header header-elements">
                <h5 class="m-0 me-2">Reports</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title m-0 me-2">
                                    <h5 class="m-0 me-2">Income Reports</h5>
                                    <small class="text-muted">Total 5 Transactions done in this
                                        @if (date('m') >= 7)
                                            {{ date('Y') . '-' . date('y') + 1 }}
                                        @else
                                            {{ date('Y') - 1 . '-' . date('y') }}
                                        @endif
                                    finantial year</small>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="p-0 m-0">
                                    <li class="d-flex mb-3 pb-1 align-items-center">
                                        <div class="badge bg-label-primary me-3 rounded p-2">
                                            <i class="ti ti-report-analytics ti-sm"></i>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">Summary Report</h6>
                                                <small class="text-muted d-block">Summary of all type incomes</small>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3 pb-1 align-items-center">
                                        <div class="badge bg-label-success rounded me-3 p-2">
                                            <i class="ti ti-report-analytics ti-sm"></i>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">Details Report</h6>
                                                <small class="text-muted d-block">Individual income report</small>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3 pb-1 align-items-center">
                                        <div class="badge bg-label-danger rounded me-3 p-2">
                                            <i class="ti ti-report-analytics ti-sm"></i>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">Daily Report</h6>
                                                <small class="text-muted d-block mb-1">Income summary of a day</small>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3 pb-1 align-items-center">
                                        <div class="badge bg-label-secondary me-3 rounded p-2">
                                            <i class="ti ti-report-analytics ti-sm"></i>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">Date range report</h6>
                                                <small class="text-muted d-block mb-1">Summary report between date range</small>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3 pb-1 align-items-center">
                                        <div class="badge bg-label-info me-3 rounded p-2">
                                            <i class="ti ti-report-analytics ti-sm"></i>
                                        </div>
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">Finantial year report</h6>
                                                <small class="text-muted d-block mb-1">Income summary of a finantial year</small>
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
