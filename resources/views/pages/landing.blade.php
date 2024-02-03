@extends('admin.layout.app')
@section('content')
    <title>KGF | Dashboard</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">Overview</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="{{ $current_project_count }}" data-skin="tron"
                                data-thickness="0.2" data-width="120" data-height="120" data-min="0"
                                data-max="{{ $total_project_count }}" data-fgColor="#f56954" data-readonly="true">
                            <div class="knob-label">Ongoing Projects</div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="{{ $completed_project_count }}" data-skin="tron"
                                data-thickness="0.2" data-width="120" data-height="120" data-min="0"
                                data-max="{{ $total_project_count }}" data-fgColor="#27ab4a" data-readonly="true">
                            <div class="knob-label">Completed Projects</div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="{{ $employee_count }}" data-skin="tron"
                                data-thickness="0.2" data-width="120" data-height="120" data-min="0"
                                data-max="{{ $total_employee_count }}" data-fgColor="#878518" data-readonly="true">
                            <div class="knob-label">Total Employees</div>
                        </div>
                        <div class="col-6 col-md-3 text-center">
                            <input type="text" class="knob" value="{{ $board_of_director_count }}" data-skin="tron"
                                data-thickness="0.2" data-width="120" data-height="120" data-min="0"
                                data-max="{{ $total_employee_count }}" data-fgColor="#188781" data-readonly="true">
                            <div class="knob-label">Board of Directors</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery Knob -->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <script>
        $(function() {
            /* jQueryKnob */

            $('.knob').knob({
                draw: function() {

                    // "tron" case
                    if (this.$.data('skin') == 'tron') {

                        var a = this.angle(this.cv) // Angle
                            ,
                            sa = this.startAngle // Previous start angle
                            ,
                            sat = this.startAngle // Start angle
                            ,
                            ea // Previous end angle
                            ,
                            eat = sat + a // End angle
                            ,
                            r = true

                        this.g.lineWidth = this.lineWidth

                        this.o.cursor &&
                            (sat = eat - 0.3) &&
                            (eat = eat + 0.3)

                        if (this.o.displayPrevious) {
                            ea = this.startAngle + this.angle(this.value)
                            this.o.cursor &&
                                (sa = ea - 0.3) &&
                                (ea = ea + 0.3)
                            this.g.beginPath()
                            this.g.strokeStyle = this.previousColor
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                            this.g.stroke()
                        }

                        this.g.beginPath()
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
                        this.g.stroke()

                        this.g.lineWidth = 2
                        this.g.beginPath()
                        this.g.strokeStyle = this.o.fgColor
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth *
                            2 / 3, 0, 2 * Math.PI, false)
                        this.g.stroke()

                        return false
                    }
                }
            })
            /* END JQUERY KNOB */
        })
    </script>
@endsection
