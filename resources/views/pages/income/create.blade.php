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
                        <form action="{{ route('income-create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date">
                                </div>
                                <div class="col-3 mb-2">
                                    <label class="form-label">Financial Year</label>
                                    <span class="badge badge-center rounded-pill bg-label-danger"><i
                                            class="ti ti-star"></i></span>
                                    <select class="form-control" name="financial_year">
                                        @foreach ($financial_year as $item)
                                            <option value="{{ $item->id }}">{{ $item->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Fund Type</label>
                                    <select class="form-control" name="fund_type">
                                        <option>Endowment Trust</option>
                                        <option>BKGET Fund</option>
                                        <option value="null">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Income Head</label>
                                    <span class="badge badge-center rounded-pill bg-label-danger"><i
                                            class="ti ti-star"></i></span>
                                    <select class="form-control" name="income_head">
                                        @foreach ($income_head as $item)
                                            <option value="{{ $item->id }}">{{ $item->head_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Number</label>
                                    <input type="text" name="number" class="form-control" placeholder="FDR Number" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Bank Name</label>
                                    <select class="form-control" name="bank_id" id="bank_id">
                                        @foreach ($bank_list as $item)
                                            <option value="{{ $item->id }}">{{ $item->bank_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Branch Name</label>
                                    <select class="form-control" name="branch_id" id="branch_id">
                                        @foreach ($branch_list as $item)
                                            <option value="{{ $item->id }}">{{ $item->branch_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label class="form-label">Opening Date</label>
                                    <input type="date" name="opening_date" class="form-control" />
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Maturity Date</label>
                                    <input type="date" name="maturity_date" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 mb-2">
                                    <label class="form-label">Duration</label>
                                    <div class="input-group">
                                        <input type="number" name="duration" class="form-control" placeholder="Duration">
                                        <span class="input-group-text">Months</span>
                                    </div>
                                </div>
                                <div class="col-3 mb-2">
                                    <label class="form-label">Interest Rate</label>
                                    <div class="input-group">
                                        <input type="number" name="interest_rate" step="0.01" class="form-control"
                                            placeholder="Interest Rate">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <label class="form-label">Amount</label>
                                    <span class="badge badge-center rounded-pill bg-label-danger"><i
                                            class="ti ti-star"></i></span>
                                    <div class="input-group">
                                        <input type="number" name="amount" class="form-control" placeholder="Amount">
                                        <span class="input-group-text">in Taka</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Note</label>
                                <textarea class="form-control" name="note" placeholder="Note"></textarea>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Attachment</label>
                                <input type="file" name="attachment" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script>
        $('#bank_id').on('change', function() {
            $("#branch_id").empty();
            var html = '';
            $.ajax({
                url: 'api/branch-list-get/' + this.value,
                type: "get",
                dataType: "json",
                success: function(response) {
                    for (let index = 0; index < response.length; index++) {
                        html += '<option value="' + response[index].id +
                            '">' + response[index].branch_name +
                            '</option>';
                    }
                    $("#branch_id").append(html);
                }
            });
        });
    </script>
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
