@extends('layouts.app')

@section('title','Create Post')

@section('content')
    <div class="container">
      <h1>Create Post</h1>
      <form method="POST" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Add Title" value=" {{old('title')}}">
        </div>
        <div class="form-group">
          <label for="image">Load Image</label>
          <input class="form-control pb-5 pt-3" type="file" id="name" name="image">
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          <select class="form-control" id="category_id" name="category_id">
            <option value="">Choose a category</option>
            @foreach ($categories as $category)
              <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea type="text" class="form-control" name="description" placeholder="Add Description" rows="6"> {{old('description')}} </textarea>
        </div>
        @foreach ($tags as $tag)
          <div class="form-check form-check-inline">
            <input name="tags[]" class="form-check-input" type="checkbox" id="tag_{{$tag->id}}" value="{{$tag->id}}">
            <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
          </div>
        @endforeach
        <div>
          <button type="submit" class="my-2 btn btn-success" type="submit">Create</button>
        </div>
      </form> 
    </div>
@endsection