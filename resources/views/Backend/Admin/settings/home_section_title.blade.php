@extends('layouts.admin_app')
@section('title', 'admin | homesection')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Home Section Title Setting</h6>
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
      <h3 class="mb-0">Home Section Title Setting Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <form action="{{ route('admin.setting.title.update', $title_settings->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="donation_button_en">Donation Button Text English</label>
                    <input type="text" class="form-control" id="donation_button_en" name="donation_button_en" value="{{ $title_settings->donation_button_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donation_button_bn">Donation Button Text Bangla</label>
                  <input type="text" class="form-control" id="donation_button_bn" name="donation_button_bn" value="{{ $title_settings->donation_button_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_title_en">Blood Donor List Title English</label>
                  <input type="text" class="form-control" id="donar_title_en" name="donar_title_en" value="{{ $title_settings->donar_title_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="donar_title_bn">Blood Donor List Title Bangla</label>
                  <input type="text" class="form-control" id="donar_title_bn" name="donar_title_bn" value="{{ $title_settings->donar_title_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="blood_appoirment_en">Blood Apportment Title English</label>
                  <input type="text" class="form-control" id="blood_appoirment_en" name="blood_appoirment_en" value="{{ $title_settings->blood_appoirment_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="blood_appoirment_bn">Blood Apportment Title Bangla</label>
                  <input type="text" class="form-control" id="blood_appoirment_bn" name="blood_appoirment_bn" value="{{ $title_settings->blood_appoirment_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="appoirment_button_en">Blood Apportment Button Text English</label>
                  <input type="text" class="form-control" id="appoirment_button_en" name="appoirment_button_en" value="{{ $title_settings->appoirment_button_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="appoirment_button_bn">Blood Apportment Button Text Bangla</label>
                  <input type="text" class="form-control" id="appoirment_button_bn" name="appoirment_button_bn" value="{{ $title_settings->appoirment_button_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="gallery_title_en">Gallery Heading Title English</label>
                  <input type="text" class="form-control" id="gallery_title_en" name="gallery_title_en" value="{{ $title_settings->gallery_title_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="gallery_title_bn">Gallery Heading Title Bangla</label>
                  <input type="text" class="form-control" id="gallery_title_bn" name="gallery_title_bn" value="{{ $title_settings->gallery_title_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="gallery_subtitle_en">Gallery Sub Heading Title English</label>
                  <input type="text" class="form-control" id="gallery_subtitle_en" name="gallery_subtitle_en" value="{{ $title_settings->gallery_subtitle_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="gallery_subtitle_bn">Gallery Sub Heading Title Bangla</label>
                  <input type="text" class="form-control" id="gallery_subtitle_bn" name="gallery_subtitle_bn" value="{{ $title_settings->gallery_subtitle_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="blog_title_en">Blog Title English</label>
                  <input type="text" class="form-control" id="blog_title_en" name="blog_title_en" value="{{ $title_settings->blog_title_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="blog_title_bn">Blog Title Bangla</label>
                  <input type="text" class="form-control" id="blog_title_bn" name="blog_title_bn" value="{{ $title_settings->blog_title_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="blog_subtitle_en">Blog Sub Title English</label>
                  <input type="text" class="form-control" id="blog_subtitle_en" name="blog_subtitle_en" value="{{ $title_settings->blog_subtitle_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="blog_subtitle_bn">Blog Sub Title Bangla</label>
                  <input type="text" class="form-control" id="blog_subtitle_bn" name="blog_subtitle_bn" value="{{ $title_settings->blog_subtitle_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="newsletter_summery_en">Newslatter Summer English</label>
                  <input type="text" class="form-control" id="newsletter_summery_en" name="newsletter_summery_en" value="{{ $title_settings->newsletter_summery_en }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="newsletter_summery_bn">Newslatter Summer Bangla</label>
                  <input type="text" class="form-control" id="newsletter_summery_bn" name="newsletter_summery_bn" value="{{ $title_settings->newsletter_summery_bn }}">
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="about_text_en">Footer About Text English</label>
                  <textarea class="form-control" name="about_text_en" id="about_text_en" cols="30" rows="4">
                    {{ $title_settings->about_text_en }}
                  </textarea>
                </div><!-- End group -->

                <div class="form-group">
                  <label class="form-control-label" for="about_text_bn">Footer About Text Bangla</label>
                  <textarea class="form-control" name="about_text_bn" id="about_text_bn" cols="30" rows="4">
                    {{ $title_settings->about_text_bn }}
                  </textarea>
                </div><!-- End group -->

                <button class="btn btn-primary btn-sm" type="submit">Update Setting</button>
            </div><!-- End colum -->
          </div><!--- End row -->

      </form><!-- End Form -->
    </div><!-- End Card Body -->
</div><!-- end card -->

@endsection