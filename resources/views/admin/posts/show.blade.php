@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection


@section('content')
    <div class="container">
        <h1>Post: {{$post->title}}</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                    <tr>
                        @if ($post->image)
                            <td><img class="w-50" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}"></td> 
                        @else
                            <td><img class="w-50" src="{{asset('img/hacker-4031973_1920.jpg')}}" alt="{{$post->title}}"></td>
                        @endif
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->slug}}</td>
                        @if ($post->category == null)
                            <td>Null</td>     
                        @else
                            <td>{{$post->category->name}}</td>     
                        @endif  
                        <td>     
                            @foreach ($post->tags as $tag)
                                <a href="{{route('admin.tags.show', $tag->id)}}"><span class="badge badge-primary">{{$tag->name}}</span></a> 
                            @endforeach     
                        </td>    
                        @if ($diffInDate == 0)
                            <td>Today</td>                   
                        @else
                            <td>{{$diffInDate}} days ago</td>    
                        @endif
                        <td class="d-flex">
                            <a class="mr-2 btn btn-secondary" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                            <a class="mr-2 btn btn-primary" href="{{route('admin.posts.index')}}">Back</a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection