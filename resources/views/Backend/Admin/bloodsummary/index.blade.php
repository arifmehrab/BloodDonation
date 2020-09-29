@extends('layouts.admin_app')
@section('title', 'admin | Blood-summary')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Blood Summary & About Us sections</h6>
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
      <h3 class="mb-0">Edit Blood Summary & About Us Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-12">
           <!-- Form groups used in grid -->
      <form action="{{ route('admin.blood.summary.update', $blood_summary->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="about_content">About Page Content</label>
                    <textarea class="form-control summernote text-dark" id="about_content" name="about_content" cols="4" rows="4">
                      {{ $blood_summary->about_content }}
                    </textarea>
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="summery_rules">Summery Rules Content</label>
                    <textarea class="form-control summernote text-dark" id="summery_rules" name="summery_rules" cols="30" rows="10">
                        {{ $blood_summary->summery_rules }}
                    </textarea>
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="summery_section_one">Summery Section One Content</label>
                    <textarea class="form-control summernote text-dark" id="summery_section_one" name="summery_section_one" cols="30" rows="10">
                        {{ $blood_summary->summery_section_one }}
                    </textarea>
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="summery_section_two">Summery Section Two Content</label>
                    <textarea class="form-control summernote text-dark" id="summery_section_two" name="summery_section_two" cols="30" rows="10">
                        {{ $blood_summary->summery_section_two }}
                    </textarea>
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="summery_section_three">Summery Section Three Content</label>
                    <textarea class="form-control summernote text-dark" id="summery_section_three" name="summery_section_three" cols="30" rows="10">
                        {{ $blood_summary->summery_section_three }}
                    </textarea>
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label" for="summery_section_four">Summery Section Four Content</label>
                    <textarea class="form-control summernote text-dark" id="summery_section_four" name="summery_section_four" cols="30" rows="10">
                        {{ $blood_summary->summery_section_four }}
                    </textarea>
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

            <button class="btn btn-primary" type="submit">Add</button>
          </div><!--- End row -->

      </form><!-- End Form -->
        </div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->
@endsection