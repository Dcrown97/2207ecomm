@extends('layouts.admin')

@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">

    <style>
        .user-block .comment, .user-block .description, .user-block .username {
            margin-left: 0px !important;
        }
    </style>
@endsection

@section('title', 'Product Tags')
@section('tags', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Product Tags</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="accordion">
            @foreach($tags as $tag)
                <div class="card">
                    <div class="card-header" id="heading{{$tag->id}}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $tag->id }}" aria-expanded="true" aria-controls="collapse{{ $tag->id }}">
                                {{ $tag->name }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{$tag->id}}" class="collapse" aria-labelledby="heading{{$tag->id}}" data-parent="#accordion">
                        <div class="card-body">
                            @if(!empty($tag->products))
                            <div class="filter-container p-0 row">
                                @foreach($tag->products as $prod)
                                <div class="filtr-item col-sm-2">
                                    <a href="{{ route('view.product', $prod->id) }}" >
                                        <div class="card bg-dark text-blue">
                                            <img class="card-img" src="{{ asset('/img/products/'.$prod->images[0]->file_path) }}" alt="{{ $prod->name }}">
                                            <div class="card-img-overlay">
                                                <h5 class="card-title text-blue">{{ $prod->name }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <!-- Summernote -->
    <script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}"></script>
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
            })

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        });

    </script>
@endsection

