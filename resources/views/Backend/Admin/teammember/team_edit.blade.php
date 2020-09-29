@extends('layouts.admin_app')
@section('title', 'admin | district')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Team Members Edit</h6>
      </div>
      <div class="col-lg-6 col-5 text-right">
        <a href="#" class="btn btn-sm btn-neutral">New</a>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Edit Team Members Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-12">
           <!-- Form groups used in grid -->
      <form action="{{ route('admin.team.member.update', $teamEdit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label" for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <br>
                    <img src="{{ asset('Backend/assets/media/ourteam/'.$teamEdit->image) }}" width="80" alt="">
                </div>
            </div><!-- End colum -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $teamEdit->name }}">
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $teamEdit->sub_title }}">
                </div>
            </div><!-- End colum -->
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="facebook_url">Facebook Url</label>
                    <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{ $teamEdit->facebook_url }}">
                </div>
            </div><!-- End colum -->
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="mobile_number">Mobile Number</label>
                    <input type="number" class="form-control" id="mobile_number" name="mobile_number" value="{{ $teamEdit->mobile_number }}">
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->
            <button class="btn btn-primary btn-sm" type="submit">Add</button>
          </div><!--- End row -->

      </form><!-- End Form -->
        </div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection