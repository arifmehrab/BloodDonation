@extends('layouts.app')
@section('title', 'user | Dashboard')
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
						<li class="active">
							<a href="#">
							<i class="fa fa-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="{{ route('user.edit.profile') }}">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
							 Profile Update</a>
						</li>
                        <li>
							<a href="{{ route('user.edit.info') }}">
                            <i class="fa fa-list" aria-hidden="true"></i>
							 Informaton Update</a>
						</li>
						<li>
							<a href="{{ route('user.password.change') }}">
							<i class="fa fa-key"></i>
							Change Password</a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		@php
			$user_title = App\Models\homesettingone::select('user_title', 'user_gallery_title', 'user_post_title')->first();
		@endphp
		<div class="col-md-8">
            <div class="profile-content">
				<marquee scrollamount="3" behavior="scroll" direction="left"
					onmouseover="this.stop();"
					onmouseout="this.start();">
					<h4>{{ $user_title->user_title }}</h4>
				</marquee>
				<hr>
				<div>
					<p>{{ $user_title->user_gallery_title }}</p>
					<a class="btn btn-success" href="{{ route('user.photo.gallery') }}">All PHOTO</a> /
					<a class="btn btn-primary" href="{{ route('user.photo.gallery.create') }}">ADD PHOTO</a>
					<hr>
					<p>{{ $user_title->user_post_title }}</p>
					<a class="btn btn-info" href="{{ route('user.post.create') }}">ADD POST</a>/ 
					<a class="btn btn-success" href="{{ route('user.post.index') }}">ALL POST</a>
				</div>
            </div>
		</div>
	</div>
</div>
@endsection