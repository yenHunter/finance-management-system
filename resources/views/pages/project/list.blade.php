@extends('admin.layout.app')
@section('content')
    <title>KGF | Project List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Project</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Project List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 40%">
                                    Project
                                </th>
                                <th style="width: 20%">
                                    Team Members
                                </th>
                                <th style="width: 5%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 15%" class="text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($project_list as $project)
                                <tr>
                                    <td>
                                        {{ $project->project_code }}
                                        <br />
                                        <small>{{ $project->project_title }}</small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            @foreach ($researcher_list as $researcher)
                                                @if ($project->id == $researcher->project_id)
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        title="{{ $researcher->researcher_name . ', ' . $researcher->researcher_role }}">
                                                        <img alt="Avatar" class="table-avatar"
                                                            src="{{ $researcher->researcher_picture }}">
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="project-state">
                                        @if ($project->project_status == 1)
                                            <span class="badge badge-success">On-going</span>
                                        @else
                                            <span class="badge badge-danger">Completed</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        {{-- <a class="btn btn-outline-primary btn-xs" href="#">
                                            <i class="fas fa-folder"></i> View
                                        </a>
                                        <a class="btn btn-outline-warning btn-xs"
                                            href="{{ route('project-update', ['id' => $project->id]) }}">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a> --}}
                                        <a class="btn btn-outline-danger btn-xs"
                                            href="{{ route('project-delete', ['id' => $project->id]) }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">Nothing to show</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
