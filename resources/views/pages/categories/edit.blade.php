@extends('layouts.default')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
    <form class="user" method="POST" action="{{route('category.update', $category->id)}}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="" name="categories" value="{{$category->categories}}">
        </div>
        <div class="form-group py-3">
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit"> Update</button>
        </div>
    </form>
        </div>
    </div>
</div>
@endsection