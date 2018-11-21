@extends('layouts.blog-post')

@section('content')

<h1>Post</h1>

<!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body}}</p>
                <hr>

                @if (Session::has('comment_message'))

                    {{session('comment_message')}}
                    
                @endif

                <!-- Blog Comments -->

                <!-- Comments Form -->
                
                @if (Auth::check())
                
                <div class="well">
                    <h4>Leave a Comment:</h4>
                
                    
                    
                    {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
                    
                    {!! Form::hidden('post_id', $post->id ) !!}
                    
                    
                    
                        <div class="form-group">
                            {!! Form::label('body', 'Body:') !!}
                            
                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                        </div>

                        <div class="form-group">
                            
                            {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
                            
                        </div>

                    
                    {!! Form::close() !!}
                    
                    
               
                   
                </div>

                @endif
                
                <hr>
                @if (count($comments)>0)
                    @foreach ($comments as $comment)
                        
                
                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="64" width="64" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>
                        <div class="comment-reply-container">

                                        
                            <buton class="toggle-replay btn btn-primary pull-right">Reply</buton>
                              
                            <div class="comment-reply col-sm-8"> <br>
                       {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                           
                           {!! Form::hidden('comment_id', $comment->id) !!}
                           
                           <div class="form-group">
                           {!! Form::label('body', 'Title:') !!}
                           
                           {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1]) !!}
                       </div>
                       <div class="form-group">
                           {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                       </div>

                       {!! Form::close() !!}
                   </div>
                   </div>

                            <!-- Nested Comment -->
                        @if (count($comment->replies)>0)
                            
                        
                            @foreach ($comment->replies as $reply)
                                
                                @if($reply->is_active==1)
                                    
                                
                                <div id="nasted-comment" class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object"  height="40" width="40" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        <p>{{$reply->body}}</p>
                                    </div>
                                    
                                 
                            </div>
                            
                            @endif
                            @endforeach
                            @endif

                            <!-- End Nested Comment -->




                    </div><hr>
                </div>

                    @endforeach    
                @endif
               
    
@endsection
@section('scripts')
    <script>
            $('.toggle-replay').click(function(){

                $(this).next().slideToggle('slow');
                
            });


    </script>
@endsection