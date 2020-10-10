@extends('layouts.app')
@section('title', 'user | Photo-upload')
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
							 Add Photo</a>
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
                <div class="col-md-12 col-sm-12" id="regi_form_design">
                     <div id="register_form">
                         <form action="{{ route('user.photo.gallery.store') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="form-row">
                                 <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="gallery_image">Add Photo Here (Photo size Maximum 3MV) <strong style="color: red;">*</strong></label>
                                        <div class="custom-file mb-3">
                                            <input name="gallery_image" type="file" class="form-control" id="gallery_image" onchange="readURL(this)" required>
                                        </div>
                                            <!--- Error Message -->
                                            @error('gallery_image')
                                            <strong style="color: red;">{{ $message }}</strong>
                                            @enderror
                                      </div>
                                 </div><!-- end colum -->
                             </div><!-- end form row -->
                             <button id="Profile" type="submit" class="btn btn-primary btn-block btn-sm">Add Photo</button>
         
                         </form>
                     </div><!-- end register -->
                 </div><!-- end col md 8 -->
            </div><!-- end row -->
            </div><!--- Profile content -->
		</div>
	</div>
</div>
@endsection