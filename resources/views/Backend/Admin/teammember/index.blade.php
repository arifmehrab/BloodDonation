@extends('layouts.admin_app')
@section('title', 'admin | district')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Team Members sections</h6>
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
      <h3 class="mb-0">Add Team Members Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-12">
           <!-- Form groups used in grid -->
      <form action="{{ route('admin.team.member.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label" for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div><!-- End colum -->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label" for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->

          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
            </div><!-- End colum -->
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="facebook_url">Facebook Url</label>
                    <input type="text" class="form-control" id="facebook_url" name="facebook_url">
                </div>
            </div><!-- End colum -->
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-control-label" for="mobile_number">Mobile Number</label>
                    <input type="number" class="form-control" id="mobile_number" name="mobile_number">
                </div>
            </div><!-- End colum -->
          </div><!--- End row -->
            <button class="btn btn-primary btn-sm" type="submit">Add</button>
          </div><!--- End row -->

      </form><!-- End Form -->
        </div>
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
          <h2 class="mb-0">Total Team Members ({{ $ourTeams->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th>SubTitle</th>
                  <td>Mobile</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              @foreach($ourTeams as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->sub_title }}</td>
                  <td>{{ $row->mobile_number }}</td>
                  <td>
                      <img src="{{ asset('Backend/assets/media/ourteam/'.$row->image) }}" alt="$row->image" width="100">
                  </td>
                  <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.team.member.edit', $row->id) }}"><i class="fa fa-edit"></i></a>
                        <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                            <i class="fa fa-trash"></i>
                        </button>
                        <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.team.member.destory', $row->id) }}">
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