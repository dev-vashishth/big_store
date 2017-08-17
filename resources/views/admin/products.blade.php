@extends('master')
@section('content')
<div class="row">
	@if (Session::has('message'))
	<p class="alert alert-success">{{ Session::get('message') }}</p>
	@endif
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                Products
            </header>
            <div class="panel-body table-responsive ">
                <div class="box-tools m-b-15">  
                    <div class="input-group">
                        <a href="<?php echo action('ProductController@create') ?>" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th style="width : 10%;">Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th style="width : 15%;"><center>Action</center></th>
                        </tr>
                
                        @foreach ($products as $row) 
                            <tr>
                                <td><img src="{{  url('/images/products/'.$row->image) }}" class="img-thumbnail" alt="Cinque Terre" width="70" height="70"></td>
                                <td>{{ ucfirst($row->name) }}</td>
                                <td>{{ ucfirst($row->category->name) }}</td>
                                <td>{{ ucfirst($row->price) }}</td>
                                <td>{{ ucfirst($row->quantity) }}</td>
                                <td>{{ ucfirst($row->details) }}</td>
                                <td style="width:15%">
                                    <center>
                                        <form action="{{action('ProductController@destroy', $row->id)}}" method="post">
                                            {{csrf_field()}}
                                            <a href="{{action('ProductController@edit', $row->id)}}" class="btn btn-info">Edit</a>&nbsp;&nbsp;
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure that you want to delete this record ?')">Delete</button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="pull-right">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
