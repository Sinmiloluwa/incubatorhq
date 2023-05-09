@extends('layouts.default')
@section('content')
<div class="row">
    @php
        $allPosts = \App\Models\Post::all();
        $users = \App\Models\User::all();
        $pageViewPosts = \App\Models\Post::where('published', true)->orderBy('page_views', 'desc')->take(5)->get();
        $progressBar = [];
    @endphp
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Posts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$allPosts->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users->count()}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Visits
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
                            </div>
                            {{-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Comments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Content Column -->
     <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Top Page Views</h6>
            </div>
            <div class="card-body">
                @foreach ($pageViewPosts as $post)
                @php
                    if ($post->page_views <= 30) 
                        $progressBar[] = "progress-bar bg-danger";
                        elseif ($post->page_views >=50 && $post->page_views < 80) 
                            $progressBar[] = "progress-bar bg-secondary";
                        elseif ($post->page_views > 80) 
                        $progressBar[] = "progress-bar bg-success";
                        
                @endphp
                <h4 class="small font-weight-bold">{{$post->title}}<span
                    class="float-right">{{$post->page_views}}%</span></h4>
                <div class="progress mb-4">
                    <div class="{{array_shift($progressBar)}}" role="progressbar" style="width: {{$post->page_views}}%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>


@endsection
