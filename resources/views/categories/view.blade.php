@extends('layouts.admin')

@section('style')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('title', $category->name)
@section('categories', 'active')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Product Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('categories')}}">Categories</a></li>
                        <li class="breadcrumb-item active">View</li>
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
                    <div class="card card-widget">
                        <div class="card-header">
                            <h4 class="card-title">{{ $category->name }}</h4>
                            <!-- /.user-block -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-green" title="Edit Category" data-toggle="modal" data-target="#edit">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button type="button" class="btn btn-tool text-danger" title="Delete Category"  onclick="var result = confirm('Are you very sure you want to delete this Category?');
                                    if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$category->id}}').submit();
                                    }
                                    ">
                                    <i class='fas fa-trash'></i>
                                </button>
                                <form id="delete-form{{$category->id}}" action="{{ route('delete.category',[$category->id]) }}" method="post" style="display:none;">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete">
                                </form>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <div class="card mb-12 bg-gradient-dark">
                                    <img class="card-img-top" src="{{ asset('/img/categories/'. $category->image) }}" alt="{{ $category->name }}">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <a href="#" class="text-white">Created: <i class="time-ago">{{ $category->created_at }}</i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            @if($category->products->isNotEmpty())
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-widget collapsed-card">
                            <div class="card-header">
                                <h4 class="card-title">Products Under {{ $category->name }}</h4>
                                <!-- /.user-block -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool text-danger" title="Add Product To Category" data-toggle="modal" data-target="#add_product">
                                        <i class="fas fa-plus-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach( $category->products as $product)
                                    <div class="col-md-4 col-lg-3 col-sm-2">
                                        <div class="card mb-12 bg-gradient-dark">
                                            <a href="{{ route('view.product', $product->id) }}">
                                                <img class="card-img-top" src="{{ asset('/img/products/'. $product->images[0]->file_path) }}" alt="{{ $product->name }}">
                                            </a>
                                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                <h5 class="card-title text-primary">{{ $product->name }}</h5>
    {{--                                                    <div class="card-text pb-1 pt-1 text-white ">--}}
    {{--                                                        <div class="show-less-div" style="display: block">{!! $product->description !!}</div>--}}
    {{--                                                    </div>--}}
                                                <div class="card-img-overlay">
                                                    <a href="{{ route('view.product', $product->id) }}" class="text-green">Created: <i class="time-ago">{{ $product->created_at }}</i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            @else
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> No products found!</h5>Click this <a href="#" data-toggle="modal" data-target="#add_product">link</a> to add products to this category.
                </div>
            @endif
        </div>
        <!-- /.container-fluid -->
        <!-- /.edit category -->
        <div class="modal fade" id="edit">
            <div class="modal-dialog">
                <!-- form start -->
                <form action="{{ route('update.category') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header bg-blue">
                            <h4 class="modal-title">Edit Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="id" value="{{ $category->id }}" >
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Enter category name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Category Image</label>
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
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </form>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.add product -->
        <div class="modal fade" id="add_product">
            <div class="modal-dialog modal-lg">
                <!-- form start -->
                <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title">Add New Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}" >
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
                            <div class="form-group">
                                <label>Product Tags</label>
                                <input type="text" class="form-control" name="tags" placeholder="separate each tag with a comma ','">
                            </div>
                            <div class="form-group">
                                <label>Descriptions</label>
                                <textarea class="form-control" rows="5" name="description" id="summernote" placeholder="Add product details"></textarea>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Save changes</button>
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
    <!-- Summernote -->
    <script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('/js/showmoreless.js') }}"></script>
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
        $(function(){
            $('.show-less-div').myOwnLineShowMoreLess({
                showLessLine: 3
            });
        });

    </script>
@endsection
