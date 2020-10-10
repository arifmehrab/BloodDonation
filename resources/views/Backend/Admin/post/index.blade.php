@extends('layouts.admin_app')
@section('title', 'admin | Posts')
@section('content_head')
<div class="header-body">
    <div class="row align-items-center py-4">
      <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">Posts</h6>
      </div>
      <div class="col-lg-6 col-5 text-right">
        <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-neutral">New</a>
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
          <h2 class="mb-0">Total Posts ({{ $posts->count() }})</h2>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">
            <thead class="thead-light">
              <tr>
                <th>User</th>
                <th>Title</th>
                <td>View</td>
                <td>Image</td>
                <td>Status</td>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($posts as $row)
              <tr>
                <td>{{ $row->user->name }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->view_count }}</td>
                <td><img width="80" src="{{ asset('Backend/assets/media/posts/'.$row->image) }}" alt="{{ $row->image }}"></td>
                <td>
                    @if($row->status == 0)
                    <strong class="badge badge-danger">Pending</strong>
                    @else
                    <strong class="badge badge-primary">Live Post</strong>
                    @endif
                </td>
                <td>
                    <a title="Edit" class="btn btn-success btn-sm" href="{{ route('admin.post.edit', $row->id) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a title="View" class="btn btn-info btn-sm" href="{{ route('admin.post.show', $row->id) }}">
                      <i class="fa fa-eye "></i>
                    </a>
                      <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deleteItem({{ $row->id }})">
                          <i class="fa fa-trash"></i>
                      </button>
                      <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('admin.post.destroy', $row->id) }}">
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