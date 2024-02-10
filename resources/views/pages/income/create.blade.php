@extends('layout.app')
@section('content')
    <title>Mohajon | Income Create</title>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a class="text-muted fw-light" href="#">Income List</a> / Create</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Income Records</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Income Code</label>
                                    <input type="text" value="Income-" class="form-control" placeholder="Income Code" />
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Fund Type</label>
                                    <select class="form-control" name="fund_type">
                                        <option value="1">Endowment Trust</option>
                                        <option value="2">BKGET Fund</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Financial Year</label>
                                    <input type="text" name="financial_year" value="" class="form-control"
                                        placeholder="Financial Year" />
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Bank Name</label>
                                    <select class="form-control" name="bank_id">
                                        <option value="1">City Bank, Farmgate Branch</option>
                                        <option value="2">Dutch Bangla Bank Limited, Farmgate Branch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">FDR Number</label>
                                <input type="text" name="fdr_no" class="form-control" placeholder="FDR Number" />
                            </div>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Opening Date</label>
                                    <input type="date" name="opening_date" value="" class="form-control" />
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Maturity Date</label>
                                    <input type="date" name="maturity_date" value="" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Duration</label>
                                    <input type="text" name="duration" value="" class="form-control"
                                        placeholder="Duration" />
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Interest Rate</label>
                                    <div class="input-group">
                                        <input type="number" name="interest_rate" class="form-control"
                                            placeholder="Interest Rate">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Amount</label>
                                    <div class="input-group">
                                        <input type="number" name="amount" class="form-control" placeholder="Amount">
                                        <span class="input-group-text">in Taka</span>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Duration</label>
                                    <input type="number" name="duration" value="" class="form-control"
                                        placeholder="Duration" />
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Note</label>
                                <textarea class="form-control" placeholder="Note"></textarea>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('head')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
@endpush
