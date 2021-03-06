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
            <li class="breadcrumb-item active" aria-current="page">District Widget</li>
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
      <h3 class="mb-0">Add District Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <form action="{{ route('admin.district.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label class="form-control-label" for="divition">Select Divition Name</label>
               <select name="divition_id" id="divition" class="form-control" required>
                 <option value="">-- Select Divition --</option>
                 @foreach($divitions as $row)
                   <option value="{{ $row->id }}">{{ $row->divition_name }}</option>
                 @endforeach
                 @error('divition_id')
                  <strong class="text-danger">{{ $message }}</strong>
                 @enderror
               </select>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="district">District Name</label>
                <input type="text" class="form-control" id="district" placeholder="District Name" name="district_name" required>
                @error('district_name')
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
          <h2 class="mb-0">Total Divition ({{ $districts->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>SL.</th>
                <th>Divition Name</th>
                <td>District Name</td>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($districts as $key => $row)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $row->divition->divition_name }}</td>
                <td>{{ $row->district_name }}</td>
                <td>
                    <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.district.edit', $row->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                      <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                          <i class="fa fa-trash"></i>
                      </button>
                      <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.district.destory', $row->id) }}">
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