@extends('layouts.admin_app')
@section('title', 'admin | district')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Address Managment</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">District</a></li>
            <li class="breadcrumb-item active" aria-current="page">District Edit</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
@endsection
@section('content_body')
<div class="card mb-4">
    <!-- Card header -->
    <div class="card-header">
      <h3 class="mb-0">Edit District Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.district.update', $districtEdit->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label class="form-control-label" for="divition">Select Divition Name</label>
               <select name="divition_id" id="divition" class="form-control" required>
                 @foreach($divitions as $row)
                   <option {{ ($districtEdit->divition_id == $row->id) ? 'selected':'' }} value="{{ $row->id }}">{{ $row->divition_name }}</option>
                 @endforeach
                 @error('divition_id')
                  <strong class="text-danger">{{ $message }}</strong>
                 @enderror
               </select>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="district">District Name</label>
                <input type="text" class="form-control" id="district" placeholder="District Name" name="district_name" required value="{{ $districtEdit->district_name }}">
                @error('district_name')
                  <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
          </form>
        </div>
        <div class="col-md-2"></div>
      </div><!--- End row -->
    </div><!-- End Card Body -->
</div><!-- end card -->
@endsection