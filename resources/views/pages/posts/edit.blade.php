@extends('layouts.default')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
    <form class="user" method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
        @csrf
        @if (session('errors'))
            <small class="text-sm text-center text-danger">{{session('errors')->first('message')}}</small>
        @endif
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Post Title" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Meta Title" name="meta_title" value="{{$post->meta_title}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Slug" name="slug" value="{{$post->slug}}">
        </div>
        <div class="form-group">
            <textarea id="myeditorinstance" name="content">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Summary" name="summary" value="{{$post->summary}}">
        </div>

        <label for="cars">Categories:</label>
        <select id="cars" name="category" class="form-control form-control" name="category" value="{{$post->category}}">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->categories}}</option>
            @endforeach
        </select>

        <div class="mb-3 mt-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="featured_image">
          </div>
        <div class="form-group py-3">
        <button class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="submit">Drafts</button>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit"> Publish</button>
        </div>
    </form>
        </div>
    </div>
</div>
@endsection
