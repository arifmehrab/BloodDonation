@extends('layouts.app')
@section('title', 'user | post-create')
@push('css')
<link href="{{ asset('Backend/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endpush
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
							 Edit Post</a>
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
                  <h3 class="mb-0">Edit Post Here</h3>
                  <br>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                       <div class="col-lg-12 col-md-12">
                         <form action="{{ route('user.post.update', $postEdit->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="form-row">
                               <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                       <label for="title">Post Title (পোস্ট শিরোনাম)</label>
                                       <input type="text" class="form-control" id="title" name="title" required value="{{ $postEdit->title }}">
                                    </div><!-- End form group -->
                               </div><!-- end clum 12 -->
                          </div><!-- End form row -->
            
                          <div class="form-row">
                            <div class="col-lg-6 col-md-6">
                                 <div class="form-group">
                                    <label for="category">Post Category (পোস্ট ক্যাটাগরি)</label>
                                    <select id="category" class="form-control" name="categories[]" required>
                                      <option value="">-- Select Category --</option>
                                        @foreach($categories as $row)
                                        <option 
                                        @foreach($postEdit->categories as $cat)
                                            {{ ($cat->id == $row->id) ? 'selected': '' }}
                                        @endforeach
                                         value="{{ $row->id }}">{{ $row->category_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                 </div><!-- End form group -->
                            </div><!-- end clum 12 -->
            
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                 <label for="add_tag">Tages (পোস্ট সম্পর্কিত কিছু কমন শব্দ)</label>
                                 <br>
                                 <input name="tags" type="text" class="form-control" value="{{ $postEdit->tags }}" data-role="tagsinput" placeholder="Add Tages Here" id="add_tag" required/>
                              </div><!-- End form group -->
                            </div><!-- end clum 12 -->
                          </div><!-- End form row -->
            
                          <div class="form-row">
                            <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                    <label for="body">Post Details (পোস্ট বিবরণ )</label>
                                    <textarea required class="form-control" name="body" id="body" cols="30" rows="8">
                                        {{ $postEdit->body }}
                                    </textarea>
                                 </div><!-- End form group -->
                            </div><!-- end clum 12 -->
                          </div><!-- End form row -->
                          
                          <div class="form-row">
                            <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                    <label for="image">Post image (পোস্ট এর একটা ছবি দিন.)</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <br>
                                    <span>পূর্ববর্তী ছবি </span>
                                    <img width="120" src="{{ asset('Backend/assets/media/posts/'.$postEdit->image) }}" alt="{{ $postEdit->image }}">
                                 </div><!-- End form group -->
                            </div><!-- end clum 12 -->
                          </div><!-- End form row -->
            
                          <div class="form-row">
                            <div class="col-lg-12 col-md-12">
                                 <div class="form-group">
                                  <input type="submit" name="submit" value="Publish" class="btn btn-primary">
                                 </div><!-- End form group -->
                            </div><!-- end clum 12 -->
                          </div><!-- End form row -->
            
                         </form>
                       </div><!-- Colum 12 end -->
                  </div><!--- End row -->
                </div><!-- End Card Body -->
            </div><!-- end card -->
		</div><!--  end col 8 -->
	</div>
</div>
@endsection
@push('js')
<script src="{{ asset('Backend/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
@endpush
