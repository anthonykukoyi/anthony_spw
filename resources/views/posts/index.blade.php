@extends('layouts.app')

@section('content')
    
    <h1 style="margin-top: 10px">Blog Posts</h1>
    <br>
        @if(count($posts) > 0)
                @foreach($posts as $post)
                    <a href="/posts/{{$post->id}}">
                        <div class="card" style="margin-bottom:18px">
                            <div class="row">
                                <div class="col-md-4 col-sm-4" style="margin-right:auto margin-left:auto">
                                    <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}">
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3>{{$post->title}}</h3>
                                    <small>Written on {{$post->created_at->format('d.m.Y H:i')}} by {{$post->user->name}}</small>
                                </div>     
                            </div>    
                        </div>
                    </a>
                @endforeach
                {{$posts->links()}}
            @else
            <p>No posts found</p>
        @endif
@endsection
