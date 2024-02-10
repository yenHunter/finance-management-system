@extends('layout.app')
@section('content')
    <title>Mohajon | Expense Create</title>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><a class="text-muted fw-light" href="{{ route('expense-list') }}">Expense List</a> /
            Create</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Expense Records</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Expense Code</label>
                                    <input type="text" value="Expense-" class="form-control"
                                        placeholder="Expense Code" />
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Fund Type</label>
                                    <select class="form-control" name="expense_head">
                                        <option>Expense Head 1</option>
                                        <option>Expense Head 2</option>
                                        <option>Expense Head 3</option>
                                        <option>Expense Head 4</option>
                                        <option>Expense Head 5</option>
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
                                    <label class="form-label">Expense Date</label>
                                    <input class="form-control" type="date" />
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Amount</label>
                                <div class="input-group">
                                    <input type="number" name="amount" class="form-control" placeholder="Amount">
                                    <span class="input-group-text">in Taka</span>
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
