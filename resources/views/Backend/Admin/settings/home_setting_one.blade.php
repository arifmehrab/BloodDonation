@extends('layouts.admin_app')
@section('title', 'admin | homesettingone')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Home Settings One</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">setting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home setting Module</li>
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
      <h3 class="mb-0">Home Setting One Info Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form action="{{ route('admin.setting.one.update', $home_setting_one->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="header_top_title_en">Header Top Title English</label>
                    <textarea class="form-control" name="header_top_title_en" id="header_top_title_en" cols="30" rows="5">
                      {{ $home_setting_one->header_top_title_en }}
                    </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="header_top_title_bn">Header Top Title Bangla</label>
                  <textarea class="form-control" name="header_top_title_bn" id="header_top_title_bn" cols="30" rows="5">
                    {{ $home_setting_one->header_top_title_bn }}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="banner_title_en">Banner Title English</label>
                  <input type="text" class="form-control" id="banner_title_en" name="banner_title_en" value="{{ $home_setting_one->banner_title_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="banner_title_bn">Banner Title Bangla</label>
                  <input type="text" class="form-control" id="banner_title_bn" name="banner_title_bn" value="{{ $home_setting_one->banner_title_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_regi_title_en">Donar Registation Title English</label>
                  <input type="text" class="form-control" id="donar_regi_title_en" name="donar_regi_title_en" value="{{ $home_setting_one->donar_regi_title_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_regi_title_bn">Donar Registation Title Bangla</label>
                  <input type="text" class="form-control" id="donar_regi_title_bn" name="donar_regi_title_bn" value="{{ $home_setting_one->donar_regi_title_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_regi_subtitle_en">Donar Registation SubTitle Englilsh</label>
                  <textarea class="form-control" name="donar_regi_subtitle_en" id="donar_regi_subtitle_en" cols="30" rows="5">
                    {{ $home_setting_one->donar_regi_subtitle_en }}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_regi_subtitle_bn">Donar Registation SubTitle Bangla</label>
                  <textarea class="form-control" name="donar_regi_subtitle_bn" id="donar_regi_subtitle_bn" cols="30" rows="5">
                    {{ $home_setting_one->donar_regi_subtitle_bn }}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_regi_button_en">Donar Registation Button English</label>
                  <input type="text" class="form-control" id="donar_regi_button_en" name="donar_regi_button_en" value="{{ $home_setting_one->donar_regi_button_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_regi_button_bn">Donar Registation Button Bangla</label>
                  <input type="text" class="form-control" id="donar_regi_button_bn" name="donar_regi_button_bn" value="{{ $home_setting_one->donar_regi_button_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="site_video_link">website Video Overview url</label>
                  <textarea class="form-control" name="site_video_link" id="site_video_link" cols="30" rows="5">
                    {{ $home_setting_one->site_video_link }}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="user_title">User Dashboard Title</label>
                  <textarea class="form-control" name="user_title" id="user_title" cols="30" rows="5">
                    {{ $home_setting_one->user_title }}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="user_gallery_title">User Dashboard Gallery Image Title</label>
                  <textarea class="form-control" name="user_gallery_title" id="user_gallery_title" cols="30" rows="5">
                    {{ $home_setting_one->user_gallery_title }}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="user_post_title">User Dashboard Post Title</label>
                  <textarea class="form-control" name="user_post_title" id="user_post_title" cols="30" rows="5">
                    {{ $home_setting_one->user_post_title }}
                  </textarea>
                </div><!-- End group -->

                <button class="btn btn-primary btn-sm" type="submit">Update Setting</button>
            </div><!-- End colum -->
          </div><!--- End row -->

      </form><!-- End Form -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection