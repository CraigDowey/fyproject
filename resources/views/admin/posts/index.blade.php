@extends('layouts.admin')



@section('content')

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="75" src="{{$post->photo ? public_path() . $post->photo->file : 'http://placehold.it/400x400'}}" ></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, 30)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

    @stop