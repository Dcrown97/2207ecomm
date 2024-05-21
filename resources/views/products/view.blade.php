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

@section('title', $product->name)
@section('products', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        View Product
                        <button type="button" class="btn btn-tool text-success" title="Edit Product" data-toggle="modal" data-target="#edit">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button type="button" class="btn btn-tool text-primary" title="Post Product"  onclick="var result = confirm('Are you very sure you want to post this Product?');
                            if(result){
                                event.preventDefault();
                                document.getElementById('post-product{{$product->id}}').submit();
                            }
                            ">
                            <i class='fab fa-usps'></i>
                        </button>
                        <form id="post-product{{$product->id}}" action="{{ route('post.product',[$product->id]) }}" method="post" style="display:none;">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                        </form>
                        <button type="button" class="btn btn-tool text-danger" title="Delete Product"  onclick="var result = confirm('Are you very sure you want to delete this Product?');
                            if(result){
                                event.preventDefault();
                                document.getElementById('delete-product{{$product->id}}').submit();
                            }
                            ">
                            <i class='fas fa-trash'></i>
                        </button>
                        <form id="delete-product{{$product->id}}" action="{{ route('delete.product',[$product->id]) }}" method="post" style="display:none;">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete">
                        </form>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{ $product->name }}</h3>
                        <div class="col-12">
                            <img src="@if($product->images->isNotEmpty()) {{ asset('/img/products/'. $product->images[0]->file_path) }} @endif" class="product-image" alt="{{ $product->name }}">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            @foreach($product->images as $image)
                                <div class="product-image-thumb">
                                    <img src="{{ asset('/img/products/'.$image->file_path) }}" alt="Product Image">
                                    <button type="button" class="btn btn-xs text-danger" title="Delete Image"  onclick="var result = confirm('Are you very sure you want to delete this Image?');
                                        if(result){
                                        event.preventDefault();
                                        document.getElementById('delete-form{{$image->id}}').submit();
                                        }
                                        ">
                                        <i class='fas fa-times'></i>
                                    </button>
                                    <form id="delete-form{{$image->id}}" action="{{ route('delete.image',[$image->id]) }}" method="post" style="display:none;">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <button type="button" class="btn-outline-info w-100" data-toggle="modal" data-target="#add-image"><i class="fas fa-plus"></i> New Image</button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $product->name }} <small class="float-right">@if($product->posted == 1)<span class="badge badge-primary">Posted</span> @else  <span class="badge badge-warning">Pending</span> @endif</small></h3>

                        <hr>
                        <h4>Tags</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach( $product->tags as $tag)
                            <label class="btn btn-default text-center">
                                <a href="#" title="Click to Remove Tag"  onclick="var result = confirm('Are you very sure you want to remove this tag?');
                                    if(result){
                                    event.preventDefault();
                                    document.getElementById('remove_tag{{$tag->id}}').submit();
                                    }
                                    ">{{ $tag->name }}</a>
                                <br>
{{--                                <i class="fas fa-times text-danger"></i>--}}
                                <form id="remove_tag{{$tag->id}}" action="{{ route('remove.tag',[$product->id, $tag->id]) }}" method="post" style="display:none;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                            </label>
                            @endforeach
                            <label class="btn btn-default text-center">
                                <a href="#" title="Add Tag to product" data-toggle="modal" data-target="#add_tag">Add Tag</a>
                            </label>
                        </div>

                        <h4 class="mt-3">Sizes </h4>
                        @if($product->sizes->isNotEmpty())
                        <div class="btn-group-toggle nav" id="vert-tabs-tab" role="tablist" aria-orientation="horizontal">
                            <?php $w = 1; ?>
                            @foreach($product->sizes as $size)
                                <label class="btn btn-default text-center" id="size{{ $size->id }}" data-toggle="pill" href="#value{{ $size->id }}" role="tab" aria-controls="tabs-home-{{$size->id}}" @if($w == 1) aria-selected="true" @else aria-selected="false" @endif >
                                    <span class="text-xl">{{ $size->size }}{{ $size->measure }}</span>
                                </label>
                                <?php $w++; ?>
                            @endforeach
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <div class="tab-content" id="vert-tabs-right-tabContent">
                                <?php $i = 1; ?>
                                @foreach($product->sizes as $size)
                                    <div class="tab-pane fade @if($i == 1) show active @endif" id="value{{ $size->id }}" role="tabpanel" aria-labelledby="vert-tabs-right-home-tab{{ $size->id }}">
                                        <h2 class="mb-0">
                                            Quantity: {{ $size->quantity }}
                                            <button type="button" class="btn btn-xs text-danger float-right" title="Delete this size"  onclick="var result = confirm('Are you very sure you want to remove this size?');
                                                if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-size{{$size->id}}').submit();
                                                }
                                                ">
                                                <i class='fas fa-times'></i>
                                            </button>
                                            <form id="delete-size{{$size->id}}" action="{{ route('delete.size',[$size->id]) }}" method="post" style="display:none;">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="delete">
                                            </form>
                                            <button type="button" class="btn btn-xs text-success float-right" title="Edit this size" data-toggle="modal" data-target="#edit-size-{{ $size->id }}">
                                                <i class='fas fa-pen'></i>
                                            </button>
                                        </h2>
                                        <h4 class="mt-0">
                                            <small>₦{{ number_format($size->cost_ngn, 2) }} </small><br>
                                            <small>${{ number_format($size->cost_dol, 2) }} </small>
                                        </h4>
                                    </div>
                                    <!-- /.edit size -->
                                    <div class="modal fade" id="edit-size-{{ $size->id }}">
                                        <div class="modal-dialog">
                                            <!-- form start -->
                                            <form action="{{ route('edit.size') }}" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-blue">
                                                        <h4 class="modal-title">Edit Size/Price</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="put" >
                                                        <input type="hidden" name="id" value="{{ $size->id }}" >
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Size</label>
                                                                    <input type="number" class="form-control" name="size" value="{{ $size->size }}" placeholder="Enter Size" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Measure <small>(e.g. " for inches)</small></label>
                                                                    <input type="text" class="form-control" name="measure" value="{{ $size->measure }}" placeholder="Unit to be displayed">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>QTY in Stock</label>
                                                                    <input type="number" class="form-control" name="quantity" value="{{ $size->quantity }}" placeholder="Enter Quantity In Stock">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Product Naira Price</label>
                                                                    <input type="number" class="form-control" name="cost_ngn" value="{{ $size->cost_ngn }}" step="0.01" placeholder="Enter Price in Naira" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Product Dollars Price</label>
                                                                    <input type="number" class="form-control" name="cost_dol" step="0.01" value="{{ $size->cost_dol }}" placeholder="Enter Price in Dollars" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Edit size</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </form>
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <?php $i++; ?>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div class="mt-4">
                            <div class="btn btn-primary w-100 btn-flat" data-toggle="modal" data-target="#add_size">
                                <i class="fas fa-dollar fa-lg mr-2"></i>
                                Add Size
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                            <a class="nav-item nav-link" id="product-specs-tab" data-toggle="tab" href="#product-specs" role="tab" aria-controls="product-specs" aria-selected="false">Specifications</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Reviews</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            {!! $product->description !!}
                        </div>
                        <div class="tab-pane fade" id="product-specs" role="tabpanel" aria-labelledby="product-specs-tab">
                            @if($product->specifications->isNotEmpty())
                                <div class="table-responsive-sm">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Heading</th>
                                                <th>Text</th>
                                                <th style="width: 8%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product->specifications as $specs)
                                            <tr>
                                                <td>{{ $specs->heading }}</td>
                                                <td>{{ $specs->value }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-xs text-danger float-right" title="Delete this size"  onclick="var result = confirm('Are you very sure you want to remove this Specification?');
                                                        if(result){
                                                        event.preventDefault();
                                                        document.getElementById('delete-spec{{$specs->id}}').submit();
                                                        }
                                                        ">
                                                        <i class='fas fa-times'></i>
                                                    </button>
                                                    <form id="delete-spec{{$specs->id}}" action="{{ route('delete.spec',[$specs->id]) }}" method="post" style="display:none;">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="delete">
                                                    </form>
                                                    <button type="button" class="btn btn-xs text-success float-right" title="Edit this size" data-toggle="modal" data-target="#edit-spec-{{ $specs->id }}">
                                                        <i class='fas fa-pen'></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- /.edit spec -->
                                            <div class="modal fade" id="edit-spec-{{ $specs->id }}">
                                                <div class="modal-dialog">
                                                    <!-- form start -->
                                                    <form action="{{ route('edit.spec') }}" method="post">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title">New Specification</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="put" >
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}" >
                                                                <input type="hidden" name="id" value="{{ $specs->id }}" >
                                                                <div class="form-group">
                                                                    <label>Heading/Caption</label>
                                                                    <input type="text" class="form-control" name="heading" value="{{ $specs->heading }}" placeholder="Add a specification caption" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Details</label>
                                                                    <textarea rows="3" class="form-control" name="value" placeholder="Enter details here">{{ $specs->value }}</textarea>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </form>
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                                <div class="mt-4">
                                    <button type="button" class="btn-primary w-100 btn-flat" data-toggle="modal" data-target="#add-spec"><i class="fas fa-plus"></i> Add Specification</button>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                            @if($product->comments->isNotEmpty())
                                <div class="card">
                                    <div class="card-body">
                                        @foreach($product->comments as $comment)
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <span class="username">
                                                        <a href="#">{{ $comment->name }}.</a>
                                                    </span>
                                                    <span class="description">Posted - <i class="time-ago">{{ $comment->created_at }}</i></span>
                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    {{ $comment->message }}
                                                </p>

                                                <p>
                                                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-envelope mr-1"></i>
                                                        {{ $comment->email }}</a>
                                                    <a href="#" class="link-black text-sm"><i class="fas fa-phone mr-1"></i>
                                                        {{ $comment->phone }}</a>
                                                </p>
                                            </div>
                                            <!-- /.post -->
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning alert-dismissible">
                                    <h5><i class="icon fas fa-ban"></i> Not Comments Yet!</h5> No comments have been made for this product yet. When comments are made they will display here!
                                </div>
                            @endIf
                        </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                            @if($product->reviews->isNotEmpty())
                                <div class="card">
                                    <div class="card-body">
                                        @foreach($product->reviews as $rating)
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                    <span class="username">
                                                        <a href="#">{{ $rating->name }}</a>
                                                    </span>
                                                <span class="description">Posted - <i class="time-ago">{{ $rating->created_at }}</i></span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>Rating:
                                                @for($z=0; $z<5; $z++)
                                                    @if($z < $rating->rating)
                                                        <i class="fa fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </p>
                                            <p>
                                                {{ $rating->message }}
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-envelope mr-1"></i>
                                                    {{ $rating->email }}</a>
                                                <a href="#" class="link-black text-sm"><i class="fas fa-phone mr-1"></i>
                                                    {{ $rating->phone }}</a>
                                            </p>
                                        </div>
                                        <!-- /.post -->
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning alert-dismissible">
                                    <h5><i class="icon fas fa-ban"></i> No Reviews Yet!</h5> This product has no reviews. Reviews will be displayed here!
                                </div>
                            @endIf
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- /.add image -->
    <div class="modal fade" id="add-image">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="{{ route('store.image') }}" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <h4 class="modal-title">Add Image To Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                        <div class="form-group">
                            <label for="exampleInputFile">Select Image</label>
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
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Image</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.add spec -->
    <div class="modal fade" id="add-spec">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="{{ route('add.spec') }}" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">New Specification</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                        <div class="form-group">
                            <label>Heading/Caption</label>
                            <input type="text" class="form-control" name="heading" placeholder="Add a specification caption" required>
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <textarea rows="3" class="form-control" name="value" placeholder="Enter details here"></textarea>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.add size -->
    <div class="modal fade" id="add_size">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="{{ route('add.size') }}" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-blue">
                        <h4 class="modal-title">Add Product Size</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" >
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="number" class="form-control" name="size" placeholder="Enter Size" required>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Measure <small>(e.g. " for inches)</small></label>
                                    <input type="text" class="form-control" name="measure" placeholder="Unit to be displayed">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>QTY in Stock</label>
                                    <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity In Stock">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Product Naira Price</label>
                                    <input type="number" class="form-control" name="cost_ngn" step="0.01" placeholder="Enter Price in Naira" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Product Dollars Price</label>
                                    <input type="number" class="form-control" name="cost_dol" step="0.01" placeholder="Enter Price in Dollars" required>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add size</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.update product -->
    <div class="modal fade" id="edit">
        <div class="modal-dialog modal-lg">
            <!-- form start -->
            <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="category_id" value="{{ $product->category_id }}" >
                        <input type="hidden" name="id" value="{{ $product->id }}" >
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Product Name" required>
                        </div>
                        @if($product->tags->isEmpty())
                            <div class="form-group">
                                <label>Product Tags</label>
                                <input type="text" class="form-control" name="tags" placeholder="separate each tag with a comma ','">
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Descriptions</label>
                            <textarea class="form-control" rows="5" name="description" id="summernote" placeholder="Add product details">{{ $product->description }}</textarea>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.add tag -->
    <div class="modal fade" id="add_tag">
        <div class="modal-dialog">
            <?php
            if($tags->isNotEmpty()){
                $rem = $tags->diff($product->tags);
                $tl = $rem->all();
                if(!empty($tl)){
            ?>
            <!-- form start -->
            <form action="{{ route('attach.tag') }}" method="post">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <div class="form-group">
                            <label>Tags</label>
                            <select class="form-control select2" name="tags[]" multiple placeholder="Select Tags" required>
                                @foreach($tl as $tlg)
                                    <option value="{{$tlg->id}}">{{ $tlg->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Add Tag</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
            <?php } else { ?>
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> All Tags Have already been added.</h5>
                </div>
            <?php } } else { ?>
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Not Found!</h5>No tags added yet.
                </div>
            <?php } ?>
        </div>
    </div>
        <!-- /.modal-dialog -->
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
