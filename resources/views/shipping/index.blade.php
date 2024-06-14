@extends('layouts.admin')

@section('title', 'SHipping')
@section('shipping', 'active')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Shipping</li>
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
                            <h3 class="card-title">All Locations and Cost </h3>
                            <a href="#" class="btn btn-xs btn-primary float-right" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if($locs->isNotEmpty())
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Location</th>
                                        <th>Cost (NGN)</th>
                                        <th>Cost (USD)</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($locs as $loc)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $loc->location }}</td>
                                            <td>{{ $loc->cost_ngn }}</td>
                                            <td>{{ $loc->cost_dol }}</td>
                                            <td><i class="time-ago">{{ $loc->created_at }}</i></td>
                                            <td>
                                                <a href="#" data-toggle="modal" class="text-success" data-target="#edit{{$i}}"><i class="fa fa-pen"></i></a>
                                                <!-- /.edit Location -->
                                                <div class="modal fade" id="edit{{$i}}">
                                                    <div class="modal-dialog">
                                                        <!-- form start -->
                                                        <form action="{{ route('add.shipping') }}" method="post" >
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h4 class="modal-title">New Location</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $loc->id }}">
                                                                    <div class="form-group">
                                                                        <label>Location</label>
                                                                        <input type="text" class="form-control" name="location" value="{{ $loc->location }}" placeholder="Enter location">
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputFile">Cost (NGN)</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="number" step="0.01" name="cost_ngn" value="{{ $loc->cost_ngn }}" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputFile">Cost (USD)</label>
                                                                                <div class="input-group">
                                                                                    <div class="custom-file">
                                                                                        <input type="number" step="0.01" name="cost_dol" value="{{ $loc->cost_dol }}" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <a href="#" class=" text-danger" onclick="var result = confirm('Are you very sure you want to delete this shipping?');
                                                    if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form{{$loc->id}}').submit();
                                                    }
                                                    ">
                                                    <i class='fas fa-trash'></i>
                                                </a>
                                                <form id="delete-form{{$loc->id}}" action="{{ route('delete.shipping',[$loc->id]) }}" method="post" style="display:none;">
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
                                    <h5><i class="icon fas fa-ban"></i> Not Found!</h5>No locations added yet
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
    </section>
    <!-- /.content -->

    <!-- /.edit shipping -->
    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="{{ route('add.shipping') }}" method="post" >
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <h4 class="modal-title">New Location</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Enter location">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Cost (NGN)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="number" step="0.01" name="cost_ngn" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Cost (USD)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="number" step="0.01" name="cost_dol" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
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
@endsection
