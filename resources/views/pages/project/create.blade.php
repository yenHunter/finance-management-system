@extends('admin.layout.app')
@section('content')
    <!-- Ion Slider -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <title>KGF | Create Project</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Project</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Project</a></li>
                            <li class="breadcrumb-item active">Create Project</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Create Project</h5>
                            {{ $message }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Project Informations</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="bs-stepper">
                                <form class="form-horizontal" action="{{ route('admin-project-create') }}" method="POST">
                                    @csrf
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#basic-info">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="basic-info" id="basic-info-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Basic Informations</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#other-info">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="other-info" id="other-info-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Other Informations</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#objective-info">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="objective-info" id="objective-info-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Objectives</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <!-- your steps content here -->
                                        <div id="basic-info" class="content" role="tabpanel"
                                            aria-labelledby="basic-info-trigger">
                                            <div class="form-group">
                                                <label>Project Title <span
                                                        class="badge badge-danger">required</span></label>
                                                <textarea class="form-control" name="project_title" placeholder="Project Title">{{ old('project_title') }}</textarea>
                                                @if ($errors->has('project_title'))
                                                    <span class="text-danger">{{ $errors->first('project_title') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Code <span class="badge badge-danger">required</span></label>
                                                    <input type="text" class="form-control" name="project_code"
                                                        placeholder="Project Code" value="{{ old('project_code') }}">
                                                    @if ($errors->has('project_code'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_code') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Call</label>
                                                    <select class="form-control" name="project_call">
                                                        @foreach ($project_call as $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('project_call'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_call') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Type <span class="badge badge-danger">required</span></label>
                                                    <select class="form-control" name="project_type">
                                                        @foreach ($project_category as $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('project_type'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_type') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Category <span
                                                            class="badge badge-danger">required</span></label>
                                                    <select class="form-control" name="project_category">
                                                        <option value="0" selected disabled>Select Category</option>
                                                        @forelse ($category_list as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @empty
                                                            <option value="0">Nothing to show</option>
                                                        @endforelse
                                                    </select>
                                                    @if ($errors->has('project_category'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_category') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Start date</label>
                                                    <input type="date" class="form-control" name="project_start_date"
                                                        value="{{ old('project_start_date') }}">
                                                    @if ($errors->has('project_start_date'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_start_date') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>End date</label>
                                                    <input type="date" class="form-control" name="project_end_date"
                                                        value="{{ old('project_end_date') }}">
                                                    @if ($errors->has('project_end_date'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_end_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Research Advisor <span
                                                            class="badge badge-danger">required</span></label>
                                                    <select class="form-control" name="project_research_advisor">
                                                        <option value="0" selected disabled>Select Research Advisor
                                                        </option>
                                                        @forelse ($employee_list as $employee)
                                                            <option value="{{ $employee->id }}">{{ $employee->emp_name }}
                                                            </option>
                                                        @empty
                                                            <option value="0">Nothing to show</option>
                                                        @endforelse
                                                    </select>
                                                    @if ($errors->has('project_research_advisor'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_research_advisor') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Total Budget <span
                                                            class="badge badge-danger">required</span></label>
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                name="project_budget"
                                                                placeholder="Total Budget (in Lac taka)"
                                                                value="{{ old('project_budget') }}">
                                                            @if ($errors->has('project_budget'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('project_budget') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p>Lac taka</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Expected Output</label>
                                                    <textarea class="form-control" name="project_expected_output" placeholder="Expected Output">{{ old('project_expected_output') }}</textarea>
                                                    @if ($errors->has('project_expected_output'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_expected_output') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Outcomes</label>
                                                    <textarea class="form-control" name="project_outcomes" placeholder="Outcomes">{{ old('project_outcomes') }}</textarea>
                                                    @if ($errors->has('project_outcomes'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_outcomes') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label>Status <code>(Leave blank if ongoing)</code></label>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="project_status" value="{{ old('project_status') }}">
                                                        <label class="form-check-label">Completed</label>
                                                    </div>
                                                    @if ($errors->has('project_status'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_status') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Progress</label>
                                                    <input id="range_5" type="text" name="project_progress"
                                                        value="{{ old('project_progress') }}">
                                                    @if ($errors->has('project_progress'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('project_progress') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12 text-right">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        onclick="stepper.next()">Next</i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="other-info" class="content" role="tabpanel"
                                            aria-labelledby="other-info-trigger">
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <h3>Project Researcher</h3>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <a class="btn btn-sm btn-info" href="#"
                                                        onclick="researcher_add_func()">Add
                                                        more</a>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="researcher_div">
                                                <div class="col-sm-6">
                                                    <label>Researcher <span
                                                            class="badge badge-danger">required</span></label>
                                                    <select class="form-control select2bs4" name="researcher_id[]"
                                                        style="width: 100%;">
                                                        <option selected disabled>Select a Researcher</option>
                                                        @forelse ($researcher_list as $researcher)
                                                            <option value="{{ $researcher->id }}">
                                                                {{ $researcher->researcher_name }},
                                                                {{ $researcher->researcher_designation }}</option>
                                                        @empty
                                                            <option value="0">Nothing to show</option>
                                                        @endforelse
                                                    </select>
                                                    @if ($errors->has('researcher_id'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('researcher_id') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Role <span class="badge badge-danger">required</span></label>
                                                    <select class="form-control" name="researcher_role[]">
                                                        <option>Coordinator</option>
                                                        <option>Principal Investigator</option>
                                                        <option>Co-Principal Investigator</option>
                                                    </select>
                                                    @if ($errors->has('researcher_role'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('researcher_role') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <h3>Implementing Organization</h3>
                                            </div>
                                            <div class="form-group">
                                                <label>Organization <span
                                                        class="badge badge-danger">required</span></label>
                                                <select class="select2" name="organization_id[]" multiple="multiple"
                                                    data-placeholder="Select a Organization" style="width: 100%;">
                                                    @forelse ($organization_list as $organization)
                                                        <option value="{{ $organization->id }}">
                                                            {{ $organization->organization_name }}</option>
                                                    @empty
                                                        <option value="0">Nothing to show</option>
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('organization_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('organization_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <h3>Implementing Location</h3>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Location <span class="badge badge-danger">required</span></label>
                                                <select class="select2" name="location_id[]" multiple="multiple"
                                                    data-placeholder="Select a Location" style="width: 100%;">
                                                    @forelse ($location_list as $location)
                                                        <option value="{{ $location->id }}">{{ $location->district }}
                                                        </option>
                                                    @empty
                                                        <option value="0">Nothing to show</option>
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('location_id'))
                                                    <span class="text-danger">{{ $errors->first('location_id') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        onclick="stepper.previous()">Previous</button>
                                                    <button type="button" class="btn btn-outline-primary float-right"
                                                        onclick="stepper.next()">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="objective-info" class="content" role="tabpanel"
                                            aria-labelledby="objective-info-trigger">
                                            <div class="form-group row">
                                                <div class="col-sm-8">
                                                    <h3>Project Objectives</h3>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <a class="btn btn-sm btn-info" href="#"
                                                        onclick="objective_add_func()">Add
                                                        more</a>
                                                </div>
                                            </div>
                                            <div class="form-group" id="objective_div">
                                                <label>Objective</label>
                                                <input type="text" class="form-control" name="objective_details[]">
                                                @if ($errors->has('objective_details'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('objective_details') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        onclick="stepper.previous()">Previous</button>
                                                    <button type="submit"
                                                        class="btn btn-outline-success float-right">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Ion Slider -->
    <script src="{{ asset('admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <script>
        $('#range_5').ionRangeSlider({
            min: 0,
            max: 100,
            type: 'single',
            step: 0.1,
            postfix: ' %',
            prettify: false,
            hasGrid: true
        });
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });
    </script>
    <script>
        function
        researcher_add_func() {
            $('#researcher_div').append(
                '<div class="col-sm-6 mt-2"><label>Researcher <span class="badge badge-danger">required</span></label><select class="form-control select2bs4" name="researcher_id[]" style="width: 100%;"><option selected disabled>Select a Researcher</option>@forelse ($researcher_list as $researcher)<option value="{{ $researcher->id }}">{{ $researcher->researcher_name }}, {{ $researcher->researcher_designation }}</option> @empty<option value="0">Nothing to show</option>@endforelse</select></div><div class="col-sm-6 mt-2"><label>Role <span class="badge badge-danger">required</span></label><select class="form-control" name="researcher_role[]"><option>Coordinator</option><option>Principal Investigator</option><option>Co-Principal Investigator</option></select></div>'
            );
        }

        function objective_add_func() {
            $('#objective_div').append(
                '<div class="form-group mt-2"><label>Objective</label><input type="text" class="form-control" name="objective_details[]"></div>'
            );
        }
    </script>
@endsection
