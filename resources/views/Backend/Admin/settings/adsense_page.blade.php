@extends('layouts.admin_app')
@section('title', 'admin | adsense-page')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Adsense page content Setting</h6>
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
      <h3 class="mb-0">Adsense page content Setting Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form action="{{ route('admin.adsense.page.update', $adsenseContent->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                  <label class="form-control-label" for="terms_of_service">Terms of Service Page Content</label>
                  <textarea class="summernote" name="terms_of_service" id="terms_of_service" cols="30" rows="4">
                    {!! $adsenseContent->terms_of_service !!}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                    <label class="form-control-label" for="privacy_policy">Privacy Policy</label>
                    <textarea class="summernote" name="privacy_policy" id="privacy_policy" cols="30" rows="4">
                      {!! $adsenseContent->privacy_policy !!}
                    </textarea>
                </div><!-- End group -->
                
                <div class="form-group">
                    <label class="form-control-label" for="copywright_disclaimar">DMCA / Copyrights Disclaime</label>
                    <textarea class="summernote" name="copywright_disclaimar" id="copywright_disclaimar" cols="30" rows="4">
                      {!! $adsenseContent->copywright_disclaimar !!}
                    </textarea>
                </div><!-- End group -->


                <button class="btn btn-primary btn-sm" type="submit">Update Page</button>
            </div><!-- End colum -->
          </div><!--- End row -->

      </form><!-- End Form -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection