@extends('layouts.admin')

@section('content')

<h1>Posts</h1>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <td>Photo</td>
        <td>Owner</td> 
        <td>Category</td> 
        <td>Title</td>  
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @if ($posts)
            
      @foreach ($posts as $post)
          
        <tr>
        
        <td>{{$post->id}}</td>
        <td><img height='70px' src="{{$post->photo ? $post->photo->file : '/images/noPhoto.svg'}}"></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category_id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      
      @endforeach

      @endif
    </tbody>
  </table>
@endsection