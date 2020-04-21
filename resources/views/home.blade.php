@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/posts/create" style="text-align:center" class="bt btn-primary btn-lg btn-block">Create Post</a>
                    <br>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Your Blog Posts</h3>
                    <br>
                    @if(count($posts) > 0)
                        <table class="table table-dark table-striped">
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <p>You have not posted yet!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
