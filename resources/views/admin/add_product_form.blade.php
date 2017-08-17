@extends('master')
@section('content')
<div class="row">
    <div class="col-xs-12">
        @if (count( $errors ) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>        
                @endforeach
            </div>
        @endif
        <div class="panel">
            <header class="panel-heading">
                Product
            </header>
            <div class="panel-body table-responsive">
                <form class="form-horizontal" method="post" action="{{ url('products') }}" enctype="multipart/form-data">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter product name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Category</label>
                        <div class="col-lg-10">
                            <select name="category_id" id="" class="form-control">
                                <option value=""> Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Image</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="image" placeholder="Enter product image" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Price (&#8377;)</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" name="price" placeholder="Enter product price" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Quantity </label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" name="quantity" placeholder="Enter product quantity" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Description </label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="details" placeholder="Enter product description" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" name="add_service" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>          
            </div>
        </div><!-- /.box -->
    </div>
</div>
@endsection
@section('script')
    