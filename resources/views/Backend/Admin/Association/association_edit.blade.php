@extends('layouts.admin_app')
@section('title', 'admin | association')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Address Managment</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Association</a></li>
            <li class="breadcrumb-item active" aria-current="page">Association Edit</li>
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
      <h3 class="mb-0">Edit Association Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.association.update', $associationEdit->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-control-label" for="association">Association Name</label>
                <input type="text" class="form-control" id="association" placeholder="Association Name" name="association_name" required value="{{ $associationEdit->associations_name }}">
                @error('association_name')
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