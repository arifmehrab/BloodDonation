@extends('layouts.app')
@section('title', 'user | Information')
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
							<i class="fa fa-list"></i>
							 Info Update</a>
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
                         <form action="{{ route('user.update.info') }}" method="POST">
                             @csrf
                             @method('put')
                             <div class="form-row">
                                 <div class="col-md-6 col-sm-6">
                                     <div class="form-group">
                                         <label for="name" class="text-light">Name (নাম)*</label><br>
                                         <input type="text" id="name" class="form-control register  @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required>
                                             @error('name')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                     </div>
                                 </div><!-- end colum -->
                                 <div class="col-md-6 col-sm-6">
                                     <div class="form-group">
                                         <label for="name" class="text-light">Email (ই-মেইল)*</label><br>
                                         <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required>
                                         @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong class="text-danger">{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                 </div><!-- end colum -->
                             </div><!-- end form row -->
         
                         <div class="form-row">
                             <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label for="blood_group" class="text-light">Blood Group (রক্তের গ্র্রুপ)*</label><br>
                                     <select name="blood_group" id="blood_group" class="form-control" required>
                                         <option>-- Select Blood Group --</option>
                                         <option {{ (Auth::user()->blood_group == 'A+'? 'selected': '') }} value="A+">A+</option>
                                         <option {{ (Auth::user()->blood_group == 'A-'? 'selected': '') }} value="A-">A-</option>
                                         <option {{ (Auth::user()->blood_group == 'B+'? 'selected': '') }} value="B+">B+</option>
                                         <option {{ (Auth::user()->blood_group == 'B-'? 'selected': '') }} value="B-">B-</option>
                                         <option {{ (Auth::user()->blood_group == 'O+'? 'selected': '') }} value="O+">O+</option>
                                         <option {{ (Auth::user()->blood_group == 'O-'? 'selected': '') }} value="O-">O-</option>
                                         <option {{ (Auth::user()->blood_group == 'AB+'? 'selected': '') }} value="AB+">AB+</option>
                                         <option {{ (Auth::user()->blood_group == 'AB-'? 'selected': '') }} value="AB-">AB-</option>
                                     </select>
                                         @error('blood_group')
                                         <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                 </div>
                             </div><!-- end colum -->
                             <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label for="phone_number" class="text-light"> Mobile number (মোবাইল নম্বর )*</label><br>
                                     <input type="number" id="phone_number" class="form-control" name="phone_number" required value="{{ Auth::user()->phone_number }}">
                                     @error('phone_number')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                 </div>
                             </div><!-- end colum -->
                         </div><!-- end form row -->
         
                         <div class="form-row">
                             <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label for="divition" class="text-light">Division (বিভাগ)*</label><br>
                                     <select name="divition" id="divition" class="form-control" required>
                                         <option value="">-- select Your Divition --</option>
                                         @foreach($divition as $row)
                                         <option value="{{ $row->id }}">{{ $row->divition_name }}
                                        </option>
                                         @endforeach
                                     </select>
                                         @error('divition')
                                         <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                 </div>
                             </div><!-- end colum -->
                             <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label for="district" class="text-light">District (জেলা)*</label><br>
                                     <select name="district" id="district" class="form-control" required>
                                        
                                     </select>
                                     @error('district')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                 </div>
                             </div><!-- end colum -->
                         </div><!-- end form row -->
         
                         <div class="form-row">
                             <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label for="upazila" class="text-light">Upazila (থানা)*</label><br>
                                     <select name="upazila" id="upazila" class="form-control" required>
                                        
                                    </select>
                                         @error('upazila')
                                         <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                 </div>
                             </div><!-- end colum -->
                             <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label for="local_area" class="text-light">Local Area (ইউনিয়ন)*</label><br>
                                      <input type="text" name="local_area" class="form-control" id="local_area" required value="{{ Auth::user()->local_area }}">
                                     @error('local_area')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                     @enderror
                                 </div>
                             </div><!-- end colum -->
                         </div><!-- end form row -->
         
                         <div class="form-row">
                             <div class="col-md-6 col-sm-6">
                                 <div class="form-group">
                                     <label for="association" class="text-light">Association (যদি কোন গ্র্রুপের সদস্য হন)*</label><br>
                                     <input type="text" name="association" class="form-control" id="association" value="{{ Auth::user()->association }}">
                                 </div>
                             </div><!-- end colum -->
                         </div><!-- end form row -->
         
                        <button id="reg_button" type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
         
                         </form>
                     </div><!-- end register -->
                 </div><!-- end col md 8 -->
            </div><!-- end row -->
            </div><!--- Profile content -->
		</div>
	</div>
</div>
@endsection
@push('js')
<script>
    jQuery(document).ready(function($) {
        $(document).on('change', '#divition', function(){
           var divition_id = $(this).val();
           $.ajax({
              url : "{{ route('show.destrict') }}",
              type: "GET",
              data: {divition_id:divition_id},
              success:function(data) {
                  var html = '<option value=""> -- Select Your District -- </option>';
                  $.each(data, function(key, v){
                     html+= '<option value="'+v.id+'">'+v.district_name+'</option>';
                  });
                  $('#district').html(html);
              }
           });
        });
    });
</script> 
<!--- Show Upazila script -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).on('change', '#district', function(){
            var district_id = $(this).val();
            $.ajax({
               url: "{{ route('show.upazila') }}",
               type: "GET",
               data: {district_id:district_id},
               success:function(data){
                  var html = '<option value="">-- Select Your Upazila --</option>';
                  $.each(data, function(key, v){
                      html+= '<option value="'+v.upazila+'">'+v.upazila+'</option>';
                  });
                  $('#upazila').html(html);
               }
            });
        });
   }); 
</script>  
<!-- Change trigger district -->
<script type="text/javascript">
   jQuery(document).ready(function($) {
        var divition_id = "{{ @Auth::user()->divition_id }}";
        if(divition_id) {
           $('#divition').val(divition_id).trigger('change');
        }
    });
</script>  
@endpush