@extends('layouts.admin_app')
@section('title', 'admin | blooddonar')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Blood Donar Managment</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Blood Donar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blood Donar Widget</li>
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
          <h2 class="mb-0">Total Blood Donar ({{ $bloodDonar->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>SL.</th>
                <th>Name</th>
                <td>Blood Group</td>
                <td>Divition</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
            @foreach($bloodDonar as $key => $row)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->blood_group }}</td>
                <td>{{ $row->divition->divition_name }}</td>
                <td>
                    @if($row->status == 1)
                    <strong class="badge badge-primary">Active</strong>
                    @else
                    <strong class="badge badge-danger">Inactive</strong>
                    @endif
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