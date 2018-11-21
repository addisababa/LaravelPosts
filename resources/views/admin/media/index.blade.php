@extends('layouts.admin')

@section('content')

<h1>Media</h1>

<table class="table">
    
    @if ($photos)
    <thead>
      <tr>
        <th>ID</th>
        <td>Name</td> 
        <th>Created</th>
        
      </tr>
    </thead>
    <tbody>
       
            
        @foreach ($photos as $photo)
            
            <tr>
            <td>{{$photo->id}}</td>
            <td><img height=100 src="{{$photo->file}}"></td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No date'}}</td>
            <td>
                {!! Form::open(['method'=>'DELETE', "action" =>['AdminMediaController@destroy', $photo->id]]) !!}
        
                  
                  {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                  
        
                {!! Form::close() !!}

            </td>
        </tr>
        
        @endforeach

      @endif
    </tbody>
  </table>
    
@endsection