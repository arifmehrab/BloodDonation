@extends('layouts.admin_app')
@section('title', 'admin | district')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Add Photo Gallery Image</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Gallery Image</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery Image Widget</li>
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
      <h3 class="mb-0">Add Gallery Image Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.photo.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="form-control-label" for="gallery_image">Select Gallery Image</label>
                <input type="file" name="gallery_image" class="form-control" id="gallery_image" required>
                 @error('gallery_image')
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

<!--- Data table start --->
 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          {{-- <h2 class="mb-0">Total Divition ({{ $districts->count() }})</h2> --}}
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
              <thead class="thead-light">
                <tr>
                  <th>SL.</th>
                  <th>User</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($photo_gallery as $key => $row)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $row->user->name }}</td>
                  <td>
                      <img src="{{ asset('Backend/assets/media/photoGallery/'. $row->photo_gallery) }}" alt="$row->photo_gallery" width="100">
                  </td>
                  <td>
                        <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                            <i class="fa fa-trash"></i>
                        </button>
                        <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.photo.gallery.delete', $row->id) }}">
                          @csrf
                          @method('DELETE')
                      </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
<!--- Data table End ---->

@endsection