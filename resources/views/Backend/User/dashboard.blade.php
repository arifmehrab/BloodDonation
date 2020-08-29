@extends('layouts.app')
@section('title', 'user | Dashboard')
@section('main_content')
<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="{{ asset('Frontend/assets/media/avator/avator.png') }}" class="img-responsive" alt="">
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
					<button type="button" class="btn btn-primary btn-sm">Profile Upload</button>
					<button type="button" class="btn btn-danger btn-sm">Info Update</button>
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
							<a href="#">
							<i class="fa fa-asl-interpreting"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-8">
            <div class="profile-content">
			   Welcome to user Dashboard
            </div>
		</div>
	</div>
</div>
@endsection