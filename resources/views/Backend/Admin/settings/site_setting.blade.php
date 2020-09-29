@extends('layouts.admin_app')
@section('title', 'admin | setting')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Site Settings</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">setting</a></li>
            <li class="breadcrumb-item active" aria-current="page">setting Module</li>
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
      <h3 class="mb-0">settings Info Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form action="{{ route('admin.setting.update', $settingInfo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="logo">Update Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    <br>
                    <img width="120" src="{{ asset('Backend/assets/media/logo/'. $settingInfo->logo) }}" alt="{{ $settingInfo->logo }}">
                </div>
            </div><!-- End colum -->
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="divition">Footer Contact Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $settingInfo->email }}" name="email" required>
                </div>
            </div><!-- End colum -->
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="phone_number">Contact Number</label>
                    <input type="number" class="form-control" id="phone_number" name="phone_number" required value="{{ $settingInfo->phone_number }}">
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-control-label" for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $settingInfo->address }}">
                </div>
            </div><!-- End colum -->
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-control-label" for="facebook_url">Facebook Url</label>
                    <input type="text" class="form-control" id="facebook_url" placeholder="Footer Email" name="facebook_url" value="{{ $settingInfo->facebook_url }}">
                </div>
            </div><!-- End colum -->
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-control-label" for="twitter_url">Twitter Url</label>
                    <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{ $settingInfo->twitter_url }}">
                </div>
            </div><!-- End colum -->
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-control-label" for="youtube_url">Youtube Url</label>
                    <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="{{ $settingInfo->youtube_url }}">
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="divition">Copyright Text</label>
                    <textarea name="copyright" id="copyright" cols="30" rows="3" class="form-control">
                        {{ $settingInfo->copyright }}
                    </textarea>
                </div>
            </div><!-- End colum -->
            <button class="btn btn-primary btn-sm" type="submit">Update Info</button>
          </div><!--- End row -->

      </form><!-- End Form -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection