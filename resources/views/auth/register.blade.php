@extends('layouts.app')
@section('title', 'register')
@section('main_content')
<div class="container">
    @php
        $divition = App\Models\divition::all();
    @endphp
   <div class="row">
       <div class="col-md-2"></div><!-- end col md 2 -->
       <div class="col-md-8" id="regi_form_design">
            <div id="register_form">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="name" class="text-light">Name (নাম)*</label><br>
                                <input type="text" id="name" class="form-control register  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
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
                                <input type="email" id="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
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
                            <label for="password" class="text-light">Password (পাসওয়ার্ড)*</label><br>
                            <input type="password" id="password" class="form-control  @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div><!-- end colum -->
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="text-light">Confirm Password (পাসওয়ার্ড নিশ্চিত করুন)*</label><br>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
                        </div>
                    </div><!-- end colum -->
                </div><!-- end form row -->

                <div class="form-row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="blood_group" class="text-light">Blood Group (রক্তের গ্র্রুপ)*</label><br>
                            <select name="blood_group" id="blood_group" class="form-control" required>
                                <option value="">-- Select Blood Group --</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
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
                            <input type="number" id="phone_number" class="form-control" name="phone_number" required>
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
                                <option value="">-- Select Your Divition --</option>
                                @foreach($divition as $row)
                                <option value="{{ $row->id }}">{{ $row->divition_name }}</option>
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
                            <select name="district" id="district" class="form-control district" required>
                                
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
                            <select name="upazila" id="upazila" class="form-control upazila" required>
                               
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
                             <input type="text" name="local_area" class="form-control" id="local_area" required>
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
                            <input type="text" name="association" class="form-control" id="association">
                                @error('association')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div><!-- end colum -->
                </div><!-- end form row -->

               <button id="reg_button" type="submit" class="btn btn-primary btn-block btn-lg">Join Now</button>

                </form>
            </div><!-- end register -->
        </div><!-- end col md 8 -->
       <div class="col-md-2"></div><!-- end col md 2 -->
   </div><!-- end row -->
</div>
<br><br>
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
@endpush
