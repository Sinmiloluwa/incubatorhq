@extends('layouts.default')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex card-header py-3 justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Draft Preview</h6>
        <a href="{{ route('post.publish', $post->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Publish</a>
    </div>
{{-- @foreach($posts as $post)
<h1 class="text-black text-center">{{ucfirst($post->title)}}</h1>
<hr style="height: 2px">
<img src="http://127.0.0.1:8000/storage/{{$post->featured_image_path ?? 'okay'}}">
<hr style="height: 2px">
{!!$post->content!!}
{{$post->category->categories}}
@endforeach
</div> --}}
<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-bg-dark" style="background-image: url(http://127.0.0.1:8000/storage/{{$post->featured_image_path}}); width:700px; height:200px; background-size:contain">
        {{-- // <img src="http://127.0.0.1:8000/storage/{{$post->featured_image_path ?? 'okay'}}" height="500" width="500"> --}}
      {{-- <div class="col-md-6 px-0">
        <h1 class="display-4 fst-italic">{{ucfirst($post->title)}}</h1>
        <p class="lead my-3">{{$post->category->categories}}</p>
        <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
      </div> --}}
    </div>
  
    {{-- <div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">World</strong>
            <h3 class="mb-0">Featured post</h3>
            <div class="mb-1 text-body-secondary">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block"> --}}
            {{-- <placeholder width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail"> --}}
          {{-- </div>
        </div>
      </div> --}}
      {{-- <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h3 class="mb-0">Post title</h3>
            <div class="mb-1 text-body-secondary">Nov 11</div>
            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block"> --}}
            {{-- {{< placeholder width="200" height="250" background="#55595c" color="#eceeef" text="Thumbnail" >}} --}}
          {{-- </div>
        </div>
      </div>
    </div> --}}
  
    <div class="row g-5">
      <div class="col-md-8">
        <p class="pb-4 mb-4 fst-italic border-bottom">
            An attempt at Community
        </p>
  
        <article class="blog-post text-center">
          <h2 class="blog-post-title mb-1 text-bold text-black text-center">{{ucfirst($post->title)}}</h2>
          <p class="blog-post-meta text-center">{{$post->created_at->toDateString()}} by {{$post->author->name}}</p>
            <p class="text-center">
            {!!$post->content!!}
            </p>
      </div>
  
      {{-- <div class="col-md-4">
        <div class="position-sticky" style="top: 2rem;">
          <div class="p-4 mb-3 bg-body-tertiary rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
          </div>
  
          <div class="p-4">
            <h4 class="fst-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">March 2021</a></li>
              <li><a href="#">February 2021</a></li>
              <li><a href="#">January 2021</a></li>
              <li><a href="#">December 2020</a></li>
              <li><a href="#">November 2020</a></li>
              <li><a href="#">October 2020</a></li>
              <li><a href="#">September 2020</a></li>
              <li><a href="#">August 2020</a></li>
              <li><a href="#">July 2020</a></li>
              <li><a href="#">June 2020</a></li>
              <li><a href="#">May 2020</a></li>
              <li><a href="#">April 2020</a></li>
            </ol>
          </div>
  
          <div class="p-4">
            <h4 class="fst-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div>
      </div> --}}
    </div>
  
  </main>
@endsection