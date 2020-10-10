@extends('layouts.app')
@section('title', 'user | post-create')
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
							 View Post</a>
                        </li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-8">
            <div class="card mb-4">
                <!-- Card header -->
                <div class="card-header">
                  <h4 class="mb-0">View Post Details Here</h4>
                  <br>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                          <h5><strong>Post Author:- </strong>{{ $postShow->user->name }}</h5>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <h5><strong>Post Title:- </strong>{{ $postShow->title }}</h5>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <h5><strong>Post Tags:- </strong>{{ $postShow->tags }}</h5>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <h5><strong>Post Categories:- </strong>
                          @foreach($postShow->categories as $row)
                            {{ $row->category_name. ' |' }}
                          @endforeach</h5>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <span><strong>Post Details:- <br> </strong>{!! $postShow->body !!}</span>
                        </div>
                        <br>
                        <div class="col-md-12">
                          <h5><strong>Post Thumbnails Image:- <br> </h5>
                            <img height="400" src="{{ asset('Backend/assets/media/posts/'.$postShow->image) }}" alt="{{ $postShow->image }}">
                          </h3>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <h5><strong>Post Status:- <br> </strong>
                            @if($postShow->status == 0)
                            <strong class="badge badge-danger">Pending</strong>
                            @else
                            <strong class="badge badge-primary">Live Post</strong>
                            @endif
                          </h5>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <h5><strong>Post Date:- <br> </strong>{{ date('d-m-Y', strtotime($postShow->date)) }}</h5>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <h5><strong>Post View:- <br> </strong>{{ $postShow->view_count }}</h5>
                        </div>
                      </div><!-- End row -->
                </div><!-- End Card Body -->
            </div><!-- end card -->
		</div><!--  end col 8 -->
	</div>
</div>
@endsection
