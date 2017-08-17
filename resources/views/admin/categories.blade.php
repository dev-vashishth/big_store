@extends('master')
@section('content')
<div class="row">
	@if (Session::has('message'))
	<p class="alert alert-success">{{ Session::get('message') }}</p>
	@endif
    <div class="col-xs-12">
        <div class="panel">
            <header class="panel-heading">
                categories
            </header>
            <div class="panel-body table-responsive ">
                <div class="box-tools m-b-15">  
                    <div class="input-group">
                        <a href="<?php echo action('CategoryController@create') ?>" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th style="width : 20%;">Category Name</th>
                            <th style="width : 20%;">Parent Category</th>
                            <th>Sub Categories</th>
                            <th style="width : 15%;"><center>Action</center></th>
                        </tr>
                
                        @foreach ($categories as $row) 
                            <tr>
                                <td>{{ ucfirst($row->name) }}</td>
                                <td>{{ ucfirst($row->parent_name) }}</td>
                                <td>
                                    @if(!empty($row->subcategories))
                                        <span class="label label-default">
<?php
                                        echo implode('</span> <span class="label label-default">', $row->subcategories) 
?>
                                        </span>
                                    @endif
                             </td>
                                <td>
                                    <center>
                                        <form action="{{action('CategoryController@destroy', $row->id)}}" method="post">
                                            {{csrf_field()}}
                                            <a href="{{action('CategoryController@edit', $row->id)}}" class="btn btn-info">Edit</a>&nbsp;&nbsp;
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
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
