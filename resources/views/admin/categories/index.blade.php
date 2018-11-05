@extends('layouts.admin')

@section('content')

<h1>Categories</h1>

<div class="col-sm-4">

    {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
                
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}


</div>

<div class="col-sm-8">
    @if ($categories)

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created date</th>
                <th>Updated date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)

            <tr>
                <th>{{$category->id}}</th>
                <th><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></th>
                <th>{{$category->created_at->diffForHumans()}}</th>
                <th>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'No update'}}</th>
            </tr>

            @endforeach
        </tbody>
    </table>


    @endif
</div>

@endsection