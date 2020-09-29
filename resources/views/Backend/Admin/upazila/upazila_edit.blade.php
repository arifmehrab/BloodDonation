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
            <li class="breadcrumb-item"><a href="#">Upazila  Edit</a></li>
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
      <h3 class="mb-0">Edit Upazila Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.upazila.update', $upazila_edit->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label class="form-control-label" for="divition">Select Divition Name</label>
               <select name="divition_id" id="divition" class="form-control" required>
                 <option value="">-- Select Divition --</option>
                 @foreach($divitions as $row)
                   <option {{ $row->id == $upazila_edit->divition_id ? 'selected':'' }} value="{{ $row->id }}">{{ $row->divition_name }}</option>
                 @endforeach
                 @error('divition_id')
                  <strong class="text-danger">{{ $message }}</strong>
                 @enderror
               </select>
            </div>

            <div class="form-group">
                <label class="form-control-label" for="district">Select District Name</label>
                 <select name="district" id="district" class="form-control" required>

                 </select>
              </div>

            <div class="form-group">
                <label class="form-control-label" for="upazila">Upazila Name</label>
                <input type="text" class="form-control" id="upazila" placeholder="upazila Name" name="upazila" required>
                @error('upazila')
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
@push('js')
     <!--- Show District By Ajax In Search Filed --->
     <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).on('change', '#divition', function(){
               var divition_id = $(this).val();
               $.ajax({
                   url: "{{ route('search.district.show') }}",
                   type: "GET",
                   data: {divition_id:divition_id},
                   success:function(data){
                      var html = '<option value"">-- Select Your District --</option>';
                      $.each(data, function(key, v){
                        html+= '<option value="'+v.id+'">'+v.district_name+'</option>';
                      });
                      $('#district').html(html);
                   }
               });
            });
        });
   </script>
@endpush