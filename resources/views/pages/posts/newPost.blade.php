@extends('layouts.default')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
    <form class="user" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        @if (session('errors'))
            <small class="text-sm text-center text-danger">{{session('errors')->first('message')}}</small>
        @endif
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Post Title" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Meta Title" name="meta_title" value="{{old('meta_title')}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Slug" name="slug" value="{{old('slug')}}">
        </div>
        <div class="form-group">
            <textarea id="myeditorinstance" name="content"></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Summary" name="summary" value="{{old('summary')}}">
        </div>

        <label for="cars">Categories:</label>
        <select id="cars" name="category" class="form-control form-control" name="category" value="{{old('category')}}">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->categories}}</option>
            @endforeach
        </select>
          <div class="mb-3 mt-3">
            <label for="feature" class="form-label">Feature Image</label>
            <input class="form-control" type="file" id="formFile" name="featured_image">
          </div>
          <hr>
          <div class="mb-3 mt-3 form-check">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="feature">
            <label class="form-check-label" for="flexSwitchCheckChecked">Feature Post</label>
          </div>
        <div class="form-group py-3">
        <button class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="submit" name="draft">Drafts</button>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit"> Preview</button>
        </div>
    </form>
        </div>
    </div>
</div>
@endsection
