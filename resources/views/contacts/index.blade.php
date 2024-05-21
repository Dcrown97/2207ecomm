@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('contacts', 'active')
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
                    <h1>Contact Us Messages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Contacts</li>
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
                            <h3 class="card-title">All Messages</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(!empty($contacts))
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Sent</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td><i class="time-ago">{{ $contact->created_at }}</i></td>
                                            <td>
                                                <a href="{{ route('view.contact', $contact->id) }}"><i class="fas fa-eye"></i></a>
                                                <a href="#" class=" text-danger" onclick="var result = confirm('Are you very sure you want to delete this Message?');
                                                    if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form{{$contact->id}}').submit();
                                                    }
                                                    ">
                                                    <i class='fas fa-trash'></i>
                                                </a>
                                                <form id="delete-form{{$contact->id}}" action="{{ route('delete.message',[$contact->id]) }}" method="post" style="display:none;">
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
                                    <h5><i class="icon fas fa-ban"></i> Not Found!</h5>No Categories found.
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
