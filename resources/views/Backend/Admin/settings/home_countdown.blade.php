@extends('layouts.admin_app')
@section('title', 'admin | countdown')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Home Page CountDown Settings</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
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
      <h3 class="mb-0">Home Page CountDown Here</h3>
    </div>
    <!-- Card body -->
    <div class="card-body">
      <!-- Form groups used in grid -->
      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('admin.count.down.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="icon">Add FontAwesome Icon(fa fa-facebook)</label>
                        <input type="text" class="form-control" id="icon" placeholder="fa fa-facebook" name="icon" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="count_number_en">Count Number English</label>
                        <input type="text" class="form-control" id="count_number_en" placeholder="Count Number English" name="count_number_en" required>
                    </div>
                </div>     
            </div>

            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label" for="count_number_bn">Count Number Bangla</label>
                        <input type="text" class="form-control" id="count_number_bn" placeholder="Count Number Bangla" name="count_number_bn" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label" for="title_english">Title English</label>
                        <input type="text" class="form-control" id="title_english" placeholder="Title English" name="title_english" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-control-label" for="title_bangla">Title Bangla</label>
                        <input type="text" class="form-control" id="title_bangla" placeholder="Title Bangla" name="title_bangla" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="ADD">
            </div>
          </form>
        </div><!--- End colum -->
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
          <h2 class="mb-0">Total Divition ({{ $countDowns->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>Icon</th>
                <th>CountDown Number En</th>
                <th>CountDown Number Bn</th>
                <td>Title En</td>
                <td>Title Bn</td>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($countDowns as $row)
              <tr>
                <td>{{ $row->icon }}</td>
                <td>{{ $row->count_number_en }}</td>
                <td>{{ $row->count_number_bn }}</td>
                <td>{{ $row->title_english }}</td>
                <td>{{ $row->title_bangla }}</td>
                <td>
                      <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                          <i class="fa fa-trash"></i>
                      </button>
                      <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.count.down.delete', $row->id) }}">
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