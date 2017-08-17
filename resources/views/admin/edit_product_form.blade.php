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
                <form class="form-horizontal" method="post" action="{{ action('ProductController@update', $product->id) }}" enctype="multipart/form-data">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter Product name" value="{{  $product->name }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Category</label>
                        <div class="col-lg-10">
                            <div class="ui-widget">
                                <select class="form-control" name='category_id' id="combobox" >
                                    <option value=""> Select </option>
                                    @foreach ($categories as $key => $value)
                                        <option value="{{ $key }}" <?php echo ($key == $product->category_id)? 'selected' : '' ?>> {{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Image</label>
                        <div class="col-lg-10">
                            <img src="{{  url('/images/products/'.$product->image) }}" class="img-thumbnail" alt="Cinque Terre" width="150" height="150">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product New Image</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="image" placeholder="Enter product image" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Price</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="price" placeholder="Enter Product price" value="{{  $product->price }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Quantity</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="quantity" placeholder="Enter Product price" value="{{  $product->quantity }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Product Quantity</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="details" placeholder="Enter Product details" rows="5">{{  $product->details }}</textarea>
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
