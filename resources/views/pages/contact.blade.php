@extends('admin.layout.app')
@section('content')
    <title>KGF | Contact Request List</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact Request</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($message = Session::get('success'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i>Contact Request</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Contact Request List</h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped projects table-hover" id="list_table">
                        <thead>
                            <tr>
                                <th>Name & Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th class="text-right">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contact_request as $item)
                                @if ($item->status == 0)
                                    <tr class="bg-secondary">
                                        <td class="text-nowrap">
                                            {{ $item->conatct_name }}
                                            <br />
                                            <small>{{ $item->contact_mail }}</small>
                                        </td>
                                        <td>{{ $item->contact_subject }}</td>
                                        <td>{{ $item->contact_message }}</td>
                                        <td class="text-nowrap text-right">
                                            <a href="{{ route('admin-contact-update', ['id' => $item->id, 'value' => 1]) }}"
                                                class="badge badge-success">Mark as Read</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-nowrap">
                                            {{ $item->conatct_name }}
                                            <br />
                                            <small>{{ $item->contact_mail }}</small>
                                        </td>
                                        <td>{{ $item->contact_subject }}</td>
                                        <td>{{ $item->contact_message }}</td>
                                        <td class="text-nowrap text-right">
                                            <a href="{{ route('admin-contact-update', ['id' => $item->id, 'value' => 0]) }}" class="badge badge-danger">Mark as Unread</a>
                                        </td>
                                    </tr>
                                @endif
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

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(function() {
            $('#list_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
