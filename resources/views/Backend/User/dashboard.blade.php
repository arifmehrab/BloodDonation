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
					<a href="{{ route('user.dashboard.logout') }}" type="button" class="btn btn-danger btn-sm">Logout</a>
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
		<div class="col-md-8">
            <div class="profile-content">
				<marquee scrollamount="3" behavior="scroll" direction="left"
					onmouseover="this.stop();"
					onmouseout="this.start();">
					<h4>রক্ত কৃত্তিমভাবে তৈরী করা যায় না, শুধুমাত্র একজন মানুষই পারে আরেকজন মানুষকে বাঁচাতে। কিন্তু দুঃখের ব্যাপার, প্রতিবছর বহুসংখ্যক মানুষ মারা যাচ্ছে জরুরি মুহুর্তে প্রয়োজনীয় রক্তের অভাবে। বর্তমানে বাংলাদেশে</h4>
				</marquee>
				<hr>
				<div>
					<p>রক্ত কৃত্তিমভাবে তৈরী করা যায় না, শুধুমাত্র একজন মানুষই পারে আরেকজন মানুষকে বাঁচাতে। কিন্তু দুঃখের ব্যাপার, প্রতিবছর বহুসংখ্যক মানুষ মারা যাচ্ছে জরুরি মুহুর্তে প্রয়োজনীয় রক্তের অভাবে। বর্তমানে বাংলাদেশে প্রতি বছর রক্তের প্রয়োজন মাত্র ৯ লাখ ব্যাগ। অথচ জনবহুল এই দেশে এখনো মানুষ মারা যাচ্ছে রক্তের অভাবে। রক্তের এই চাহিদা খুব সহজেই পূরণ করা সম্ভব হবে যদি আমাদের দেশের সকল প্রান্তের পূর্ণবয়স্ক মানুষদের।</p>
					<a class="btn btn-info" href="">ADD POST</a>/ 
					<a class="btn btn-success" href="">ALL POST</a>
					<hr>
					<p>রক্ত কৃত্তিমভাবে তৈরী করা যায় না, শুধুমাত্র একজন মানুষই পারে আরেকজন মানুষকে বাঁচাতে। কিন্তু দুঃখের ব্যাপার, প্রতিবছর বহুসংখ্যক মানুষ মারা যাচ্ছে জরুরি মুহুর্তে প্রয়োজনীয় রক্তের অভাবে। বর্তমানে বাংলাদেশে প্রতি বছর রক্তের প্রয়োজন মাত্র ৯ লাখ ব্যাগ। অথচ জনবহুল এই দেশে এখনো মানুষ মারা যাচ্ছে রক্তের অভাবে। রক্তের এই চাহিদা খুব সহজেই পূরণ করা সম্ভব হবে যদি আমাদের দেশের সকল প্রান্তের পূর্ণবয়স্ক মানুষদের।</p>
					<a class="btn btn-primary" href="">ADD PHOTO</a>
				</div>
            </div>
		</div>
	</div>
</div>
@endsection