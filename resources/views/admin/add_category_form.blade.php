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
                Service
            </header>
            <div class="panel-body table-responsive">
                <form class="form-horizontal" method="post" action="{{ url('categories') }}">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="" class="col-lg-2 col-sm-2 control-label">Category Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Enter Category name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2 col-sm-2 control-label">Parent Category</label>
                        <div class="col-lg-10">
                            <div class="ui-widget">
                                <select class="form-control" name='parent_category_id' id="combobox">
                                    <option value=""> Select </option>
                                    <option value="0"> Make this as a parent category </option>
                                    @foreach ($categories as $key => $value)
                                        <option value="{{ $key }}"> {{ $value }} </option>
                                    @endforeach
                                </select>
                            </div>
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
