@extends('layouts.app')
@section('title', 'user | Photo-Gallery')
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
							 My Photo</a>
                        </li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-8">
            <div class="profile-content">
               <!-- Profile info Edit -->
               <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h4>Your All Photo List</h4>
                    <br>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Your Name</th>
                          <th>Photo</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($photo_gallery as $row)
                        <tr>
                          <td>{{ $row->user->name }}</td>
                          <td>
                            <img width="150" src="{{ asset('Backend/assets/media/photoGallery/'.$row->photo_gallery) }}" alt="{{ $row->photo_gallery }}">
                          </td>
                          <td>
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="deletePhoto({{   $row->id }})">
                              <i class="fa fa-trash"></i>
                            </button>
                            <form style="display: none;" id="delete_form_{{ $row->id }}" method="post" action="{{ route('user.photo.gallery.delete', $row->id) }}">
                              @csrf
                              @method('DELETE')
                           </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                 </div><!-- end col md 8 -->
            </div><!-- end row -->
            </div><!--- Profile content -->
		</div>
	</div>
</div>
@endsection
@push('js')
 <!--- Sweet-Alert --->
 <script type="text/javascript">
  function deletePhoto(id){
      const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'mr-2 btn btn-danger'
              },
              buttonsStyling: false,
          })

          swalWithBootstrapButtons.fire({
              title: 'Are you sure?',
              text: "You Want to Delete This Photo!",
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
                      'Saved Your Photo :)',
                      'error'
                  )
              }
          })
  }

</script> 
@endpush