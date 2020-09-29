@extends('layouts.admin_app')
@section('title', 'admin | seo-setting')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Seo Settings</h6>
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
      <h3 class="mb-0">Seo settings Info Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                   <!--- Product From start --->
                    <form action="{{ route('admin.seo.update', $seo->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <!-- From section one -->
                        <div class="form-row">
                        <!--- colum 1 --->
                          <div class="col-md-6">
                              <div class="form-group">
                                 <label for="">Meta Title <strong style="color: red;">*</strong></label>
                                 <input type="text" class="form-control" name="meta_title" value="{{ $seo->meta_title }}">
                              </div>
                              <!--- Error Message -->
                              @error('meta_title')
                              <strong style="color: red;">{{ $message }}</strong>
                              @enderror
                          </div>
                          <!--- colum 2 --->
                          <div class="col-md-6">
                            <div class="form-group">
                               <label for="">Meta Author<strong style="color: red;">*</strong></label>
                               <input type="text" class="form-control" name="meta_author" value="{{ $seo->meta_author }}">
                            </div>
                          </div>
                          <!--- Error Message -->
                          @error('meta_author')
                          <strong style="color: red;">{{ $message }}</strong>
                          @enderror
                      </div><!-- From row end -->
                      
                      <!-- From section Four -->
                      <div class="form-row">
                          <div class="col-12">
                            <div class="form-group">
                                <label for="">Meta Tag<strong style="color: red;">*</strong></label>
                                <textarea name="meta_tag" rows="3" class="form-control">
                                    {{ $seo->meta_tag }}
                                </textarea>
                            </div>
                          </div>
                           <!--- Error Message -->
                           @error('meta_tag')
                           <strong style="color: red;">{{ $message }}</strong>
                           @enderror
                      </div><!-- From row end -->
        
                       <!-- From section Four -->
                       <div class="form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Meta Description<strong style="color: red;">*</strong></label>
                                <textarea name="meta_description" rows="3" class="form-control">
                                {{ $seo->meta_description }}
                                </textarea>
                            </div>
                         </div>
                         <!--- Error Message -->
                         @error('meta_description')
                         <strong style="color: red;">{{ $message }}</strong>
                         @enderror
                    </div><!-- From row end -->
                    <div class="form-row">
                        <!--- colum 1 --->
                          <div class="col-md-6">
                              <div class="form-group">
                                 <label for="">Google Analytices<strong style="color: red;">*</strong></label>
                                 <input type="text" class="form-control" name="google_analytics" value="{{ $seo->google_analytics }}">
                              </div>
                          </div>
                          <!--- colum 2 --->
                          <div class="col-md-6">
                            <div class="form-group">
                               <label for="">Bring Analytices<strong style="color: red;">*</strong></label>
                               <input type="text" class="form-control" name="bring_analytics" value="{{ $seo->bring_analytics }}">
                            </div>
                          </div>
                      </div><!-- From row end -->
                      <!-- From Submit section -->
                      <div class="form-row">
                          <div class="col-12">
                             <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                      </div>
                    </form>
                   <!--- Product From start --->
                </div>
            </div>
        </div>
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection