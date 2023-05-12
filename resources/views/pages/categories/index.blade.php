@extends('layouts.default')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="d-sm-flex card-header py-3 justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            <a href="{{route('category.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create New Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                           <td>{{$category->categories}}</td>
                           <td>{{$category->created_at->toDateString()}}</td>
                           <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-info btn-sm active" role="button">Edit</a> 
                            <form method="POST" action="{{ route('category.delete', $category->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger" href="">Delete</a>
                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection