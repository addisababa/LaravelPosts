@extends('layouts.admin')

@section('content')

<h1>Edit Categories</h1>

<div class="col-sm-8">
{!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update', ['class'=>'btn btn-primary col-sm-4 pull-left']) !!}
</div>
{!! Form::close() !!}


{!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
    
    {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-4 pull-right']) !!}
    
{!! Form::close() !!}
</div>

    
@endsection