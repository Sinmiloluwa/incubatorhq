@extends('layouts.default')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
    <form class="user" method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Post Title" name="title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Meta Title" name="meta_title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Slug" name="slug">
        </div>
        <div class="form-group">
            <textarea class="form-control form-control"
                id="exampleInputPassword" placeholder="Content" name="content"></textarea>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputPassword" placeholder="Summary" name="summary">
        </div>

        <label for="cars">Categories:</label>
        <select id="cars" name="category" class="form-control form-control" name="category">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->categories}}</option>
            @endforeach
        </select>
        <div class="form-group py-3">
        <button class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="submit">Drafts</button>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit"> Publish</button>
        </div>
    </form>
        </div>
    </div>
</div>
@endsection
