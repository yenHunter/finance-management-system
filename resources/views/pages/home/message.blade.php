@extends('admin.layout.app')
@section('content')
    <title>KGF | Message from ED</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Message from ED</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Message from ED</li>
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
                            <h5><i class="icon fas fa-check"></i>Message from ED</h5>
                            {{ $message }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username">{{ $executive_director->emp_name }}</h3>
                    <h5 class="widget-user-desc">{{ $executive_director->emp_designation }}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset($executive_director->emp_picture) }}"
                        alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <p>{{ $ed_message->column_value }}</p>
                    </div>
                    <div class="row">
                        <a class="btn btn-outline-info" href="#" data-toggle="modal" data-target="#update_modal"
                            onclick="message_edit_func({{ $ed_message->id }})">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="update_modal">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('admin-home-message') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Message</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message from ED</label>
                                    <textarea class="form-control" name="column_value" id="column_value" placeholder="Message from ED"></textarea>
                                </div>
                                <input class="form-control" type="hidden" name="message_id" id="message_id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        $(function() {
            $('#slider_list_table').DataTable({
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

    <script>
        function message_edit_func(message_id) {
            $.ajax({
                url: 'admin-home-message-edit/' + message_id,
                type: "get",
                dataType: "json",
                success: function(response) {
                    $('#message_id').val(response.id);
                    $('#column_value').val(response.column_value);
                }
            });
        }
    </script>
@endsection
