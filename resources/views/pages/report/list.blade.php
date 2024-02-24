@extends('layout.app')
@section('content')
    <title>
        Mohajon | Reports</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <a class="text-muted fw-light" href="{{ route('dashboard') }}">Dashboard </a>/ Reports
        </h4>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card border border-success">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                            <h5 class="m-0 me-2">Income Reports</h5>
                            <small class="text-muted">Total 5 Transactions done in this
                                @if (date('m') >= 7)
                                    {{ date('Y') . '-' . date('y') + 1 }}
                                @else
                                    {{ date('Y') - 1 . '-' . date('y') }}
                                @endif
                                finantial year
                            </small>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-primary me-3 rounded p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Summary Report</h6>
                                        <small class="text-muted d-block">Summary of all type incomes</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#income_summary_modal">View</button>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-warning rounded me-3 p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Income Head Report</h6>
                                        <small class="text-muted d-block">Summary of a income head</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <a class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect" href="{{route('balance-sheet')}}">View</a>
                                        {{-- <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button> --}}
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-success rounded me-3 p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
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
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
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
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
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
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
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
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="card border border-success">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                            <h5 class="m-0 me-2">Expense Reports</h5>
                            <small class="text-muted">Total 5 Transactions done in this
                                @if (date('m') >= 7)
                                    {{ date('Y') . '-' . date('y') + 1 }}
                                @else
                                    {{ date('Y') - 1 . '-' . date('y') }}
                                @endif
                                finantial year
                            </small>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-primary me-3 rounded p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Summary Report</h6>
                                        <small class="text-muted d-block">Summary of all type expense</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <button class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-warning rounded me-3 p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Expense Head Report</h6>
                                        <small class="text-muted d-block">Summary of a expense head</small>
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
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Details Report</h6>
                                        <small class="text-muted d-block">Individual expense report</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <button
                                            class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-danger rounded me-3 p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Daily Report</h6>
                                        <small class="text-muted d-block mb-1">Expense summary of a day</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <button
                                            class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-secondary me-3 rounded p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Date range report</h6>
                                        <small class="text-muted d-block mb-1">Expense summary report between date
                                            range</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <button
                                            class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 pb-1 align-items-center">
                                <div class="badge bg-label-info me-3 rounded p-2">
                                    <i class="ti ti-report-analytics ti-sm"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Finantial year report</h6>
                                        <small class="text-muted d-block mb-1">Expense summary of a finantial year</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <button
                                            class="btn rounded-pill btn-outline-vimeo btn-sm waves-effect">View</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="income_summary_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Summary Report</h3>
                        <p class="text-muted">Summary of all type incomes</p>
                    </div>
                    <form class="row g-3">
                        <div class="col-12">
                            <label class="form-label w-100">Card Number</label>
                            <select class="form-control" name="">
                                
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="John Doe" />
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label" for="modalAddCardExpiryDate">Exp. Date</label>
                            <input type="text" id="modalAddCardExpiryDate" class="form-control expiry-date-mask"
                                placeholder="MM/YY" />
                        </div>
                        <div class="col-6 col-md-3">
                            <label class="form-label" for="modalAddCardCvv">CVV Code</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="modalAddCardCvv" class="form-control cvv-code-mask"
                                    maxlength="3" placeholder="654" />
                                <span class="input-group-text cursor-pointer" id="modalAddCardCvv2"><i
                                        class="text-muted ti ti-help" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Card Verification Value"></i></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="switch">
                                <input type="checkbox" class="switch-input" />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">Save card for future billing?</span>
                            </label>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
