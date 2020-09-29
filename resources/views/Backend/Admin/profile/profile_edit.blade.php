@extends('layouts.admin_app')
@section('title', 'admin | profile')
@section('content_head')
@endsection
@section('content_body')
 <!-- Header -->
 <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('Frontend/assets/media/avator/'. Auth::user()->profile) }}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">{{ Auth::user()->name }}</h1>
          <p class="text-white mt-0 mb-5">{{ Auth::user()->about }}</p>
          <a href="#!" class="btn btn-neutral">Edit profile</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
          <img src="{{ asset('Frontend/assets/media/avator/'. Auth::user()->profile) }}" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{ asset('Frontend/assets/media/avator/'. Auth::user()->profile) }}" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3">
                {{ Auth::user()->name }}<span class="font-weight-light"></span>
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{ Auth::user()->email }}
              </div>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{ Auth::user()->phone_number }}
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>{{ Auth::user()->about }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Edit profile </h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.update.profile') }}" enctype="multipart/form-data">
              @csrf
              @method('put')
              <h6 class="heading-small text-muted mb-4">Admin information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="username">Username</label>
                      <input name="name" type="text" id="username" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                    <!-- Error Message -->
                    @error('name')
                    <strong class="text-danger">{{ $message }}</strong> 
                    @enderror
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="email">Email address</label>
                      <input name="email" type="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                     <!-- Error Message -->
                     @error('email')
                     <strong class="text-danger">{{ $message }}</strong> 
                     @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="phone_number">phone Number</label>
                      <input name="phone_number" type="number" id="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
                    </div>
                     <!-- Error Message -->
                     @error('phone_number')
                     <strong class="text-danger">{{ $message }}</strong> 
                     @enderror
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="profile">Profile</label>
                      <input type="file" id="profile" class="form-control" name="profile">
                    </div>
                    <img width="70" src="{{ asset('Frontend/assets/media/avator/'. Auth::user()->profile) }}" alt="">
                     <!-- Error Message -->
                     @error('profile')
                     <strong class="text-danger">{{ $message }}</strong> 
                     @enderror
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="phone_number">About</label>
                          <textarea name="about" id="" cols="30" rows="3" class="form-control">
                            {{ Auth::user()->about }}
                          </textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Update">
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection