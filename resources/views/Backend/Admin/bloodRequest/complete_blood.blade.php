@extends('layouts.admin_app')
@section('title', 'admin | subscriber')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Complete Blood Request!</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Pending Blood Widget</li>
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
<!--- Data table start --->
 <!-- Table -->
 <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h2 class="mb-0">Total Complete Blood Request ({{ $complete_bloods->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>Name</th>
                <td>Mobile</td>
                <td>Blood Group</td>
                <td>Address</td>
                <td>Date</td>
                <td>Time</td>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($complete_bloods as $row)
              <tr>
                <td>{{ $row->name }}</td>
                <td>{{ $row->phone_number }}</td>
                <td>{{ $row->blood_group }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->date }}</td>
                <td>{{ $row->time }}</td>
                <td>
                    <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                        <i class="fa fa-trash"></i>
                    </button>
                    <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.complete.blood.delete', $row->id) }}">
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