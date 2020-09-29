@extends('layouts.app')
@section('title', 'user | Profile')
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
					<a href="{{ route('user.dashboard.logout') }}" type="button" class="btn btn-danger btn-sm">Logout</a>
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
							<i class="fa fa-key"></i>
                            Change Password</a>
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
                         <form action="{{ route('user.password.update') }}" method="POST">
                             @csrf
                             <div class="form-row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="password">Enter Your Old Password<strong style="color: red;">*</strong></label>
                                        <div class="custom-file mb-3">
                                            <input name="current_password" type="password" class="form-control @error('current_password') Is Invalid @enderror" id="password" required>
                                        </div>
                                            <!--- Error Message -->
                                            @error('current_password')
                                            <strong style="color: red;">{{ $message }}</strong>
                                            @enderror
                                      </div>
                                </div><!-- end colum -->

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="profile">Enter Your New Password<strong style="color: red;">*</strong></label>
                                        <div class="custom-file mb-3">
                                            <input name="password" type="password" class="form-control" id="password" required>
                                        </div>
                                            <!--- Error Message -->
                                            @error('password')
                                            <strong style="color: red;">{{ $message }}</strong>
                                            @enderror
                                      </div>
                                </div><!-- end colum -->
                             </div><!-- end form row -->

                             <div class="form-row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="password">Enter Your New Password Again<strong style="color: red;">*</strong></label>
                                        <div class="custom-file mb-3">
                                            <input name="password_confirmation" type="password" class="form-control" id="password" required>
                                        </div>
                                            <!--- Error Message -->
                                            @error('password_confirmation')
                                            <strong style="color: red;">{{ $message }}</strong>
                                            @enderror
                                      </div>
                                </div><!-- end colum -->

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <br>
                                        <button style="margin-top:10px;" type="submit" class="btn btn-primary btn-block">Change</button>
                                      </div>
                                </div><!-- end colum -->
                             </div><!-- end form row -->
                         </form>
                     </div><!-- end register -->
                 </div><!-- end col md 8 -->
            </div><!-- end row -->
            </div><!--- Profile content -->
		</div>
	</div>
</div>
@endsection