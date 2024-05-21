@extends('layouts.admin')

@section('title', 'Read Message')
@section('contacts', 'active')
@section('style')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item">Contacts</li>
                        <li class="breadcrumb-item active">View Message</li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Read Message</h3>

                            <div class="card-tools">
                                <a href="#" class="btn btn-tool" title="Delete"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5>{{ ($contact->subject)? $contact->subject: "Message has no subject" }}
                                    <span class="mailbox-read-time float-right">{{ date('d M, Y h:i A') }}</span>
                                </h5>
                                <h6>From: {{ $contact->email }}
                                    <br>
                                    Phone: {{ $contact->phone }}
                                </h6>
                            </div>
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message">
                                {{ $contact->message }}
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
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

    <!-- Page specific script -->
    <script type="text/javascript">
        $(function () {
            var dt = $('.time-ago').html();
            var ago = moment(dt).fromNow();
            $(this).find(".time-ago").text(ago);
        });
    </script>
@endsection
