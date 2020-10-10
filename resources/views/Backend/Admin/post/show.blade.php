@extends('layouts.admin_app')
@section('title', 'admin | post-show')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Post View</h6>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card p-5">
  <div class="row">
    <div class="col-md-12">
      <h3><strong>Post User:- </strong>{{ $postShow->user->name }}</h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post Title:- </strong>{{ $postShow->title }}</h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post Tags:- </strong>{{ $postShow->tags }}</h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post Categories:- </strong>
      @foreach($postShow->categories as $row)
        {{ $row->category_name. ' |' }}
      @endforeach</h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post Body:- <br> </strong>{!! $postShow->body !!}</h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post Thumbnails Image:- <br> </strong>
        <img height="400" src="{{ asset('Backend/assets/media/posts/'.$postShow->image) }}" alt="{{ $postShow->image }}">
      </h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post Status:- <br> </strong>
        @if($postShow->status == 0)
        <strong class="badge badge-danger">Pending</strong>
        @else
        <strong class="badge badge-primary">Live Post</strong>
        @endif
      </h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post Date:- <br> </strong>{{ date('d-m-Y', strtotime($postShow->date)) }}</h3>
    </div>
    <hr>
    <div class="col-md-12">
      <h3><strong>Post View:- <br> </strong>{{ $postShow->view_count }}</h3>
    </div>
  </div><!-- End row -->
</div>
@endsection