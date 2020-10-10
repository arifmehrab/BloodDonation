@extends('layouts.app')
@section('title', 'user | allpost')
@section('main_content')
<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="
					@if(Auth::user()->profile == NULL)
					{{ asset('Frontend/assets/media/avator/avator.png') }}
					@else
					{{ asset('Frontend/assets/media/avator/'.Auth::user()->profile) }}
					@endif
					" class="img-responsive">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ Auth::user()->name }}
					</div>
					<div class="profile-usertitle-job">
						Blood Donar
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
                    <a href="{{ route('user.dashboard') }}" type="button" class="btn btn-primary btn-sm">Home</a>
					<button title="Logout" type="button" class="btn btn-danger btn-sm" onclick="logoutUser()">
						Logout
					</button>
					<form style="display: none;" id="logoutUser_form" method="get" action="{{ route('user.dashboard.logout') }}">
				    </form>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
                        <li>
							<a href="{{ route('user.dashboard') }}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
							 Back</a>
						</li>
						<li class="active">
							<a href="#">
							<i class="fa fa-user-plus"></i>
							 All Post</a>
                        </li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-8">
            <div class="card mb-4">
                <!-- User pending post list -->
                @if($user_pending_post->count() > 0 )
                <h4>Your All Pending Post List</h4>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>View</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user_pending_post as $row)
                    <tr>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->view_count }}</td>
                      <td>
                        <img width="100" src="{{ asset('Backend/assets/media/posts/'.$row->image) }}" alt="{{ $row->image }}">
                      </td>
                      <td>
                          @if($row->status == 0) 
                          <h5 class="badge badge-danger">Pending</h5>
                          @else
                          <h5 class="badge badge-success">Approved</h5>
                          @endif
                      </td>
                      <td>
                        <a title="Edit" class="btn btn-success btn-sm" href="{{ route('user.post.edit', $row->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a title="View" class="btn btn-info btn-sm" href="{{ route('user.post.show', $row->id) }}">
                          <i class="fa fa-eye "></i>
                        </a>
                        <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="postDelete({{   $row->id }})">
                          <i class="fa fa-trash"></i>
                        </button>
                        <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('user.post.destroy', $row->id) }}">
                          @csrf
                          @method('DELETE')
                       </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
                <!-- End user Pending List -->
                <!--- User Approved Post list -->
                @if($user_aproved_post->count() > 0)
                <h4>Your All Approved Post List</h4>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>View</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($user_aproved_post as $row)
                    <tr>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->view_count }}</td>
                      <td>
                        <img width="100" src="{{ asset('Backend/assets/media/posts/'.$row->image) }}" alt="{{ $row->image }}">
                      </td>
                      <td>
                          @if($row->status == 0) 
                          <h5 class="badge badge-danger">Pending</h5>
                          @else
                          <h5 class="badge badge-success">Approved</h5>
                          @endif
                      </td>
                      <td>
                        <a title="Edit" class="btn btn-success btn-sm" href="{{ route('user.post.edit', $row->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a title="View" class="btn btn-info btn-sm" href="{{ route('user.post.show', $row->id) }}">
                          <i class="fa fa-eye "></i>
                        </a>
                        <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="postDelete({{   $row->id }})">
                          <i class="fa fa-trash"></i>
                        </button>
                        <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('user.post.destroy', $row->id) }}">
                          @csrf
                          @method('DELETE')
                       </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
                <!-- End user approved Post list -->
            </div><!-- end card -->
		</div><!--  end col 8 -->
	</div>
</div>
@endsection
@push('js')
     <!--- Sweet-Alert --->
 <script type="text/javascript">
    function postDelete(id){
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'mr-2 btn btn-danger'
                },
                buttonsStyling: false,
            })
  
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You Want to Delete This Post!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete_form_'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Saved Your Post :)',
                        'error'
                    )
                }
            })
    }
  
  </script> 
@endpush
