@extends('layouts.admin')

@section('content')
    <h1>All Comments</h1>
    @if (count($comments)>0)

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
                <th>Created</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($comments as $comment)
                

            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{str_limit($comment->body,30)}}</td>
                <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                <td>{{$comment->created_at->diffForHumans()}}</td>

                <td>
                    @if ($comment->is_active==0)
                        
                                                
                        {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
    
                            {!! Form::hidden('is_active', '1') !!}
    
                            {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            
                        {!! Form::close() !!}
                    @else 
                    
                        
                    {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]]) !!}
                        
                        {!! Form::hidden('is_active', '0') !!}

                        {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                        
                    {!! Form::close() !!}   
                        
                    @endif
                
                </td>
                <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@update', $comment->id]]) !!}
                
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        
                        {!! Form::close() !!} 
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    @else
        <h1 class="text-center">No Comments</h1>
    @endif


@endsection