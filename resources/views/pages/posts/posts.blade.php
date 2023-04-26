@extends('layouts.default')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Posts</h1>
     <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
         For more information about DataTables, please visit the <a target="_blank"
             href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="d-sm-flex card-header py-3 justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
            <a href="{{route('posts.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create New Post</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Slug</th>
                            <th>Author</th>
                            <th>Published</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Slug</th>
                            <th>Author</th>
                            <th>Published</th>
                            <th>Created At</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->author->name}}</td>
                            <td>@if($post->published == false)
                                <i class="fa-sharp fa-regular fa-circle-xmark text-center m-auto" style="color: #e43111;"></i>
                                @else
                                <i class="fa-solid fa-circle-check" style="color: #0ce437;"></i>
                                @endif
                            </td>
                            <td>{{$post->created_at}}</td>
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
