@extends('layouts.admin')

@section('title', 'Sales Report')
@section('sales', 'active')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/plugins/bootstrap4-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sales Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sales</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="report-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="sales-content-tab" data-toggle="pill" href="#sales-content" role="tab" aria-controls="sales-content" aria-selected="true">Completed Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pending-content-tab" data-toggle="pill" href="#pending-content" role="tab" aria-controls="pending-content" aria-selected="false">Pending Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="other-content-tab" data-toggle="pill" href="#other-content" role="tab" aria-controls="other-content" aria-selected="false">Others</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="report-tabContent">
                                <div class="tab-pane fade show active" id="sales-content" role="tabpanel" aria-labelledby="sales-content-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Completed Orders</h3>
                                            <form class="float-right w-25">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" name="sales" onchange="
                                                        $('#com_search').removeAttr('disabled');
                                                    ">
                                                    <span class="input-group-append">
                                                        <button type="submit" id="com_search" disabled class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            @if($sales->isNotEmpty())
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Currency</th>
                                                        <th>Amount</th>
                                                        <th>Shipping</th>
                                                        <th>Location</th>
                                                        <th>Coupon</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sales as $sale)
                                                        <tr>
                                                            <td>{{ $sale->ref }}</td>
                                                            <td class="time-ago">{{ $sale->created_at }}</td>
                                                            <td>{{ ($sale->currency == "Naira") ? "NGN": "USD" }}</td>
                                                            <td>{{ number_format($sale->total, 2) }}</td>
                                                            <td> @if($sale->loc != null ) {{ ($sale->currency == "Naira") ? number_format($sale->loc->cost_ngn, 2) : number_format($sale->loc->cost_dol, 2) }} @else 0.00 @endif </td>
                                                            <td>{{ ($sale->loc != null ) ? $sale->loc->location : "Pick Up" }}</td>
                                                            <td> @if($sale->cou != null ) {{ ($sale->currency == "Naira") ? number_format($sale->cou->cost_ngn, 2) : number_format($sale->cou->cost_dol, 2) }} @else None @endif </td>
                                                            <td><a href="{{ route('view.sale', $sale->id) }}"><i class="fas fa-eye"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    No completed orders
                                                </div>
                                            @endif
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="tab-pane fade" id="pending-content" role="tabpanel" aria-labelledby="pending-content-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Pending Orders <small>(Yet to be paid)</small></h3>
                                            <form class="float-right w-25">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" name="pending" onchange="
                                                        $('#pen_search').removeAttr('disabled');
                                                    ">
                                                    <span class="input-group-append">
                                                        <button type="submit" id="pen_search" disabled class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            @if($pending->isNotEmpty())
                                                <table id="pending-table" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Currency</th>
                                                        <th>Amount</th>
                                                        <th>Shipping</th>
                                                        <th>Location</th>
                                                        <th>Coupon</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($pending as $sale)
                                                        <tr>
                                                            <td>{{ $sale->ref }}</td>
                                                            <td class="time-ago">{{ $sale->created_at }}</td>
                                                            <td>{{ ($sale->currency == "Naira") ? "NGN": "USD" }}</td>
                                                            <td>{{ number_format($sale->total, 2) }}</td>
                                                            <td> @if($sale->loc != null ) {{ ($sale->currency == "Naira") ? number_format($sale->loc->cost_ngn, 2) : number_format($sale->loc->cost_dol, 2) }} @else 0.00 @endif </td>
                                                            <td>{{ ($sale->loc != null ) ? $sale->loc->location : "Pick Up" }}</td>
                                                            <td> @if($sale->cou != null ) {{ ($sale->currency == "Naira") ? number_format($sale->cou->cost_ngn, 2) : number_format($sale->cou->cost_dol, 2) }} @else None @endif </td>
                                                            <td><a href="{{ route('view.sale', $sale->id) }}"><i class="fas fa-eye"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    No pending orders
                                                </div>
                                            @endif
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="tab-pane fade" id="other-content" role="tabpanel" aria-labelledby="other-contentx-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Others <small>(Failed orders)</small></h3>
                                            <form class="float-right w-25">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" name="pending" onchange="
                                                        $('#oth_search').removeAttr('disabled');
                                                    ">
                                                    <span class="input-group-append">
                                                        <button type="submit" id="oth_search" disabled class="btn btn-info btn-flat"><i class="fas fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            @if($others->isNotEmpty())
                                                <table id="oth-table" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Currency</th>
                                                        <th>Amount</th>
                                                        <th>Shipping</th>
                                                        <th>Location</th>
                                                        <th>Coupon</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($others as $sale)
                                                        <tr>
                                                            <td>{{ $sale->status }}</td>
                                                            <td>{{ $sale->ref }}</td>
                                                            <td class="time-ago">{{ $sale->created_at }}</td>
                                                            <td>{{ ($sale->currency == "Naira") ? "NGN": "USD" }}</td>
                                                            <td>{{ number_format($sale->total, 2) }}</td>
                                                            <td> @if($sale->loc != null ) {{ ($sale->currency == "Naira") ? number_format($sale->loc->cost_ngn, 2) : number_format($sale->loc->cost_dol, 2) }} @else 0.00 @endif </td>
                                                            <td>{{ ($sale->loc != null ) ? $sale->loc->location : "Pick Up" }}</td>
                                                            <td> @if($sale->cou != null ) {{ ($sale->currency == "Naira") ? number_format($sale->cou->cost_ngn, 2) : number_format($sale->cou->cost_dol, 2) }} @else None @endif </td>
                                                            <td><a href="{{ route('view.sale', $sale->id) }}"><i class="fas fa-eye"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    Not found
                                                </div>
                                            @endif
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src=" {{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('/plugins/jszip/jszip.min.js') }}"></script>
    <script src=" {{ asset('/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src=" {{ asset('/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src=" {{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src=" {{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src=" {{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src=" {{ asset('/js/customDateTimePicker.js') }}"></script>

    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#pending-table").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#pending-table_wrapper .col-md-6:eq(0)');
            $("#oth-table").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#oth-table_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script type="text/javascript">
        $(function () {
            var dt = $('.time-ago').html();
            var ago = moment(dt).fromNow();
            $(this).find(".time-ago").text(ago);
        });
    </script>
    <script type="text/javascript">

        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });
        });

    </script>
@endsection
