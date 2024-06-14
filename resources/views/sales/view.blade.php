@extends('layouts.admin')

@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <style>
        .user-block .comment, .user-block .description, .user-block .username {
            margin-left: 0px !important;
        }
        .small, small {
            font-size: 62% !important;
            font-weight: 200 !important;
        }
    </style>
@endsection

@section('title', "Sales Invoice")
@section('sales', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Invoice
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('sales')}}">Sales</a></li>
                        <li class="breadcrumb-item active">Details</li>
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
                    @if($sale->note != null && !empty($sale->note))
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        {{ $sale->note }}
                    </div>
                    @endif

                    @php(($sale->currency == 'Naira')? $cur = '₦': '$')

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="{{ asset('/img/tbally-logo.png') }}" alt="{{ config('app.name') }}" height="25px"> {{ config('app.name') }}
                                    <small class="float-right">Date: {{ date('d/m/Y', time()) }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Billing Address
                                <address>
                                    <strong>{{ $sale->billing->first. ' '. $sale->billing->last }}</strong><br>
                                    @if($sale->billing->company != null) <strong style="font-style: italic">{{ $sale->billing->company }}</strong><br> @endif
                                    {{ $sale->billing->street1 }}<br>
                                    @if($sale->billing->street2 != null && !empty($sale->billing->street2)) {{ $sale->billing->street2 }}<br> @endif
                                    City: {{  $sale->billing->city }}<br>
                                    State: {{  $sale->billing->state }}<br>
                                    Country: {{  $sale->billing->country }}<br>
                                    Phone: {{ $sale->billing->phone }}<br>
                                    Email: {{ $sale->billing->email }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <address>
                                        <strong>{{ $sale->ship->first. ' '. $sale->ship->last }}</strong><br>
                                        @if($sale->ship->company != null) <strong style="font-style: italic">{{ $sale->ship->company }}</strong><br> @endif
                                        {{ $sale->ship->street1 }}<br>
                                        @if($sale->ship->street2 != null && !empty($sale->ship->street2)) {{ $sale->ship->street2 }}<br> @endif
                                        City: {{ $sale->ship->city }}<br>
                                        State: {{ $sale->ship->state }}<br>
                                        Country: {{ $sale->ship->country }}<br>
                                        Phone: {{ $sale->ship->phone }}<br>
                                        Email: {{ $sale->ship->email }}
                                    </address>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #{{$sale->ref}}</b><br>
                                <br>
                                <b>Reference:</b> {{ $sale->ref }}<br>
                                <b>Transaction Date:</b> {{ date('d/M/Y h:i A', strtotime($sale->created_at)) }}<br>
                                <b>Amount Payable:</b> {{ $cur. number_format($sale->total, 2) }} <br>
                                <b>Transaction Status: {{ $sale->status }}</b>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Qty</th>
                                        <th>Unit Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php( $i = 1)
                                    @php( $sub = 0)
                                    @foreach($sale->items as $item)
                                        @php($sub += ($item->price * $item->quantity))
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->product }}</td>
                                        <td>{{ $item->size->size. $item->size->measure }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $cur . number_format($item->price, 2) }}</td>
                                    </tr>
                                        @php( $i++ )
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>{{ $cur .number_format($sub, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td> @if($sale->loc != null ) {{ $cur . ($sale->currency == "Naira") ? number_format($sale->loc->cost_ngn, 2) : number_format($sale->loc->cost_dol, 2) }} @else {{$cur. '0.00'}} @endif </td>                                        </tr>
                                        <tr>
                                            <th>Coupon:</th>
                                            <td>@if($sale->cou != null ) {{ $cur . ($sale->currency == "Naira") ? number_format($sale->cou->cost_ngn, 2) : number_format($sale->cou->cost_dol, 2) }} @else {{$cur. '0.00'}} @endif </td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{ $cur. $sale->total }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary float-right" onclick="window.print()" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <!-- Summernote -->
    <script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            var dt = $('.time-ago').html();
            var ago = moment(dt).fromNow();
            $(this).find(".time-ago").text(ago);
        });
        $(function () {
            // Summernote
            $('#summernote').summernote({
                height: 400
            });

            //Initialize Select2 Elements
            $('.select2').select2()
        });

    </script>
@endsection
