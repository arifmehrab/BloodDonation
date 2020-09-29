@extends('layouts.admin_app')
@section('title', 'admin | divition')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Password Change</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Password</a></li>
            <li class="breadcrumb-item active" aria-current="page">Password Chagnge Widget</li>
          </ol>
        </nav>
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
      <h3 class="mb-0">Change Password Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.password.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-control-label" for="current_password">Enter Old Password</label>
                <input type="password" class="form-control" id="current_password" placeholder="Old Password" name="current_password" required>
                @error('current_password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="password">Enter New Password</label>
                <input type="password" class="form-control" id="password" placeholder="new password" name="password" required>
                @error('password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="password_confirmation">Enter New Password Again</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="new password again" name="password_confirmation" required>
                @error('password_confirmation')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="ADD">
            </div>
          </form>
        </div>
        <div class="col-md-2"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection