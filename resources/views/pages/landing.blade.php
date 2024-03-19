@extends('layout.app')
@section('content')
    <title>Mohajon | Dashboard</title>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Total Earning -->
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-subtitle text-muted mb-1">Expense</p>
                            <h5 class="card-title fw-bold mb-0">Financial Year {{ date('Y') - 1 . '-' . date('y') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="horizontalBarChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">FDR Schedule</h5>
                            <small class="text-muted">Financial Year {{ date('Y') - 1 . '-' . date('y') }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @foreach ($fdr_schedule as $item)
                                <li class="d-flex align-items-center mb-4">
                                    <img src="{{ $item->logo }}" alt="User" class="rounded-circle me-3"
                                        width="34" />
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 me-1">{{ $item->bank_name }}</h6>
                                            </div>
                                            <small
                                                class="text-muted">{{ $item->branch_name . ' (' . $item->number . ')' }}</small>
                                        </div>
                                        <div class="user-progress">
                                            <p class="text-success fw-semibold mb-0">
                                                {{ date_format(date_create($item->maturity_date), 'z') - date('z') }} days remaining
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            {{-- <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/us.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$8,567k</h6>
                                        </div>
                                        <small class="text-muted">United states</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold mb-0">
                                            <i class="ti ti-chevron-up"></i>
                                            25.8%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/br.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$2,415k</h6>
                                        </div>
                                        <small class="text-muted">Brazil</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-danger fw-semibold mb-0">
                                            <i class="ti ti-chevron-down"></i>
                                            6.2%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/in.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$865k</h6>
                                        </div>
                                        <small class="text-muted">India</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold">
                                            <i class="ti ti-chevron-up"></i>
                                            12.4%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/au.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$745k</h6>
                                        </div>
                                        <small class="text-muted">Australia</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-danger fw-semibold mb-0">
                                            <i class="ti ti-chevron-down"></i>
                                            11.9%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4">
                                <img src="../../assets/svg/flags/fr.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$45</h6>
                                        </div>
                                        <small class="text-muted">France</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold mb-0">
                                            <i class="ti ti-chevron-up"></i>
                                            16.2%
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <img src="../../assets/svg/flags/cn.svg" alt="User" class="rounded-circle me-3"
                                    width="34" />
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$12k</h6>
                                        </div>
                                        <small class="text-muted">China</small>
                                    </div>
                                    <div class="user-progress">
                                        <p class="text-success fw-semibold mb-0">
                                            <i class="ti ti-chevron-up"></i>
                                            14.8%
                                        </p>
                                    </div>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-0">Income</h5>
                            <small class="text-muted">Financial Year {{ date('Y') - 1 . '-' . date('y') }}</small>
                        </div>
                        <div class="d-sm-flex d-none align-items-center">
                            <h5 class="fw-bold mb-0 me-3">Amount</h5>
                            <span class="badge bg-label-success">
                                <span class="align-middle">in Lac Taka</span>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="lineChart"></div>
                    </div>
                </div>
            </div>
            <!--/ Total Earning -->
        </div>
    </div>
@endsection
