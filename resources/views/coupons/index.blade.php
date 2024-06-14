@extends('layouts.admin')

@section('title', 'Coupons')
@section('coupons', 'active')
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
                    <h1>Coupons</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#add">
                                <i class="fas fa-plus"></i> Create New Coupon
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($coupons->isNotEMpty())
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Coupon</th>
                                        <th>cost (NGN)</th>
                                        <th>cost (USD)</th>
                                        <th>Useable</th>
                                        <th>Used</th>
                                        <th>Start</th>
                                        <th>Expires</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($coupons as $coupon)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ number_format($coupon->cost_ngn, 2) }}</td>
                                            <td>${{ number_format($coupon->cost_dol, 2) }}</td>
                                            <td>{{ $coupon->qty }}</td>
                                            <td>{{ $coupon->used }}</td>
                                            <td>{{ date('d-M-Y h:i A', strtotime($coupon->start)) }}</td>
                                            <td>{{ date('d-M-Y h:i A', strtotime($coupon->end)) }}</td>
                                            <td><i class="time-ago">{{ $coupon->created_at }}</i></td>
                                            <td>
                                                <a href="#" class=" text-danger" onclick="var result = confirm('Are you very sure you want to delete this coupon?');
                                                    if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form{{$coupon->id}}').submit();
                                                    }
                                                    ">
                                                    <i class='fas fa-trash'></i>
                                                </a>
                                                <form id="delete-form{{$coupon->id}}" action="{{ route('delete.coupon',[$coupon->id]) }}" method="post" style="display:none;">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </table>
                            @else
                                <div class="alert alert-danger alert-dismissible">
                                    <h5><i class="icon fas fa-ban"></i> Not Found!</h5>No Coupons added yet.
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.add coupon -->
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-lg">
                <!-- form start -->
                <form action="{{ route('store.coupon') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title">Create New Coupon</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Useable</label>
                                        <input type="number" class="form-control" name="qty" placeholder="Times coupon can be used">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cost in Naira</label>
                                        <input type="number" step="0.01" class="form-control" name="cost_ngn" placeholder="Cost (NGN)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cost in Dollars</label>
                                        <input type="number" step="0.01" class="form-control" name="cost_dol" placeholder="Cost (USD)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Start</label>
                                    <div class="input-group date datetimepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="start" id="datetimepicker1" data-target="#datetimepicker1" placeholder="Pick date coupon validity starts" />
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>End</label>
                                    <div class="input-group date datetimepicker" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="end" id="datetimepicker2" data-target="#datetimepicker2" placeholder="Pick date coupon validity ends" />
                                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </form>
            </div>
            <!-- /.modal-dialog -->
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
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
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
