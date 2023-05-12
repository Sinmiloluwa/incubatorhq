@extends('layouts.default')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
    <form class="user" method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
        @csrf
        @if (session('errors'))
            <small class="text-sm text-center text-danger">{{session('errors')->first('message')}}</small>
        @endif
        <div class="form-group">
            <input type="text" class="form-control form-control"
                id="exampleInputEmail" aria-describedby="emailHelp"
                placeholder="Category Name" name="category" value="">
        </div>
       
        <div class="form-group py-3">
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit"> Create Category</button>
        </div>
    </form>
        </div>
    </div>
</div>
@endsection
