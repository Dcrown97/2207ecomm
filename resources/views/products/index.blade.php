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

@section('title', 'Products')
@section('products', 'active')

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
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-header">
                <a href="#" class="btn btn-sm bg-primary" data-toggle="modal" data-target="#add">
                    <i class="fas fa-plus"></i> Add New Product
                </a>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3 float-right">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('products') }}" class="btn btn-sm bg-success float-right">
                    <i class="fas fa-sync-alt"></i>
                </a>

            </div>
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @foreach($products as $product)
                        <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <img src="@if($product->images->isNotEmpty()) {{ asset('/img/products/'. $product->images[0]->file_path) }} @endif" alt="{{ $product->name }}" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"> <small>{{ $product->name }} @if($product->posted == 1)<span class="badge badge-primary">Posted</span> @else  <span class="badge badge-warning">Pending</span> @endif</small></h5>
                                    <p class="card-text text-muted text-sm">
                                        <b>Tags: </b> @if($product->tags->isNotEmpty()) @foreach($product->tags as $tag) {{ $tag->name }} / @endforeach @endif
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-sm bg-danger" title="Delete Product"  onclick="var result = confirm('Are you very sure you want to delete this Product?');
                                            if(result){
                                            event.preventDefault();
                                            document.getElementById('delete-product{{$product->id}}').submit();
                                            }
                                            ">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-product{{$product->id}}" action="{{ route('delete.product',[$product->id]) }}" method="post" style="display:none;">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="delete">
                                        </form>
                                        <a href="{{ route('view.product', $product->id) }}" class="btn btn-sm bg-teal">
                                            <i class="fas fa-user"></i> View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $products->links() }}
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- /.add product -->
        <div class="modal fade" id="add">
            <div class="modal-dialog modal-lg">
                @if($categories->isNotEmpty())
                    <!-- form start -->
                    <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Add New Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Product Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Product Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id" >
                                                <option >--Select Category--</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Tags</label>
                                            <input type="text" class="form-control" name="tags" placeholder="separate each tag with a comma ','">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Descriptions</label>
                                    <textarea class="form-control" rows="5" name="description" id="summernote" placeholder="Add product details"></textarea>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </form>
                @else
                    <div class="alert alert-warning alert-dismissible">
                        <h5><i class="icon fas fa-ban"></i> No Category Found!</h5> You need to create at least one category!
                    </div>
                @endIf
            </div>
            <!-- /.modal-dialog -->
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <!-- Summernote -->
    <script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script type="text/javascript">
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

