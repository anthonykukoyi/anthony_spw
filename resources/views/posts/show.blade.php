@extends('layouts.app')

@section('content')
    <a style="margin-top: 10px" href="/posts" class="btn btn-primary">Go Back</a>
    <h1 style="margin-top: 5px">{{$post->title}}</h1>
    <hr>
        <small>Written on {{$post->created_at->format('d.m.Y H:i')}} by {{$post->user->name}}</small>
    <hr>
    <img style="width:75%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>                    
    <div>
         {!!$post->body!!}
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection