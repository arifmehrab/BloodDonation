@extends('layouts.app')
@section('title', 'Home | Blood')
@section('main_content')
@include('Frontend.partials.blood_search')
<!-- SECTION CTA  -->   

<section class="cta-section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <h2>
                    @if(Session::get('language') == 'english')
                        {{ $homeSettingOne->donar_regi_title_en }}
                        @else
                        {{ $homeSettingOne->donar_regi_title_bn }}
                    @endif
                </h2>
                <p>
                    @if(Session::get('language') == 'english')
                    {{ $homeSettingOne->donar_regi_subtitle_en }}
                    @else
                    {{ $homeSettingOne->donar_regi_subtitle_bn }}
                    @endif
                </p>
                <a class="btn btn-cta-2" href="{{ url('/register') }}">
                    @if(Session::get('language') == 'english')
                    {{ $homeSettingOne->donar_regi_button_en }}
                    @else
                    {{ $homeSettingOne->donar_regi_button_bn }}
                    @endif
                </a>
            </div> <!--  end .col-md-8  -->
        </div> <!--  end .row  -->
    </div>
</section> 

<!--  GALLERY CONTENT  -->

<section class="section-content-block section-secondary-bg">

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">
                    @if(Session::get('language') == 'english')
                    {{ $homeTitleSetting->donar_title_en }}
                    @else
                    {{ $homeTitleSetting->donar_title_bn }}
                    @endif
                </h2>
            </div> <!-- end .col-sm-10  -->                      

        </div> <!-- end .row  -->
        <br>
          <!-- Our Donar List -->
          <div class="row">
            @foreach($users as $row)
            <div class="col-md-3 col-sm-6">
                <div class="card card_style">
                    <img src="
                    @if($row->profile == NULL)
                    {{ asset('Frontend/assets/media/avator/avator.png') }}
                    @else
                    {{ asset('Frontend/assets/media/avator/'.$row->profile) }}
                    @endif
                    " 
                    alt="{{ $row->profile }}" style="width:100%; height:175px;">
                    <p><strong>Name:- </strong>{{ $row->name }}</p>
                    <p><strong>Blood Group:- </strong>{{ $row->blood_group }}</p>
                    <p><strong>Divition(বিভাগ):-</strong> {{ $row->divition->divition_name }}</p>
                    <p><strong>District(জেলা):-</strong> {{ $row->district->district_name }}</p>
                    <p><strong>Upazila(থানা):-</strong> {{ $row->upazila }}</p>
                    <p><strong>Local Area(ইউনিয়ন):-</strong> {{ $row->local_area }}</p>
                    <p><a href="tel:{{ $row->phone_number }}" id="card_button">Call:- {{ $row->phone_number }}</a></p>
                  </div>
            </div><!-- End colum -->
            @endforeach
            {{ $users->links() }}
        </div><!-- End row -->
        <!-- END our donar list -->

    </div> <!--  end .container -->

</section> <!-- end .section-content-block  -->

<!--  APPOINTMENT SECTION -->

<section class="section-appointment">

    <div class="container wow fadeInUp">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

                <div class="appointment-form-wrapper text-center clearfix">
                    <h3 class="join-heading">
                        @if(Session::get('language') == 'english')
                        {{ $homeTitleSetting->blood_appoirment_en }}
                        @else
                        {{ $homeTitleSetting->blood_appoirment_bn }}
                        @endif
                    </h3>
                    <form class="appoinment-form" action="{{ route('blood.request.store') }}" method="POST"> 
                        @csrf
                        <div class="form-group col-md-6">
                            <input id="your_name" class="form-control" placeholder="Name" type="text" name="name" >
                            @error('name')
                              <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <div class="select-style">                                    
                                <select class="form-control" name="blood_group" required>
                                    <option>-- Select Blood Group --</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                            @error('blood_group')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input id="your_phone" class="form-control" placeholder="Phone" type="text" name="phone_number" required>
                            @error('phone_number')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input id="your_email" class="form-control" placeholder="Address" type="text" name="address" required>
                             @error('address')
                              <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <input id="your_date" class="form-control" placeholder="Date" type="text" name="date" required>
                            @error('date')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <input id="your_time" class="form-control" placeholder="Time" type="text" name="time" required>
                            @error('time')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" id="textarea_message" class="form-control" rows="4" placeholder="Emergence message for blood..."></textarea>
                        </div>                                                          

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <button id="btn_submit" class="btn-submit" type="submit">
                                @if(Session::get('language') == 'english')
                                {{ $homeTitleSetting->appoirment_button_en }}
                                @else
                                {{ $homeTitleSetting->appoirment_button_bn }}
                                @endif
                            </button>
                        </div>

                    </form>

                </div> <!-- end .appointment-form-wrapper  -->

            </div> <!--  end .col-lg-6 -->

        </div> <!--  end .row  -->

    </div> <!--  end .container -->

</section>  <!--  end .appointment-section  -->
 <!--  SECTION COUNTER   -->

 <section class="section-counter"  data-stellar-background-ratio="0.3">

    <div class="container wow fadeInUp">

        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $total_donar }}</span>                            
                    <h4>Blood Donors</h4>
                    @else
                    <span class="counter">{{ $total_donar }}</span>                            
                    <h4>রক্তদাতার সংখ্যা</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_o_p }}</span>                            
                    <h4>O+ Donors</h4>
                    @else
                    <span class="counter">{{ $blood_o_p }}</span>                            
                    <h4>O+ রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_o_N }}</span>                            
                    <h4>O- Donors</h4>
                    @else
                    <span class="counter">{{ $blood_o_N }}</span>                            
                    <h4>O- রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_A_p }}</span>                            
                    <h4>A+ Donors</h4>
                    @else
                    <span class="counter">{{ $blood_A_p }}</span>                            
                    <h4>A+ রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->


        </div> <!-- end row  -->
        <!-- secend Counter -->
        
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_A_N }}</span>                            
                    <h4>A- Donors</h4>
                    @else
                    <span class="counter">{{ $blood_A_N }}</span>                            
                    <h4>A- রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_B_p }}</span>                            
                    <h4>B+ Donors</h4>
                    @else
                    <span class="counter">{{ $blood_B_p }}</span>                            
                    <h4>B+ রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_B_N }}</span>                            
                    <h4>B- Donors</h4>
                    @else
                    <span class="counter">{{ $blood_B_N }}</span>                            
                    <h4>B- রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_AB_p }}</span>                            
                    <h4>AB+ Donors</h4>
                    @else
                    <span class="counter">{{ $blood_AB_p }}</span>                            
                    <h4>AB+ রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">
                    @if(Session::get('language') == 'english')
                    <span class="counter">{{ $blood_AB_N }}</span>                            
                    <h4>AB- Donors</h4>
                    @else
                    <span class="counter">{{ $blood_AB_N }}</span>                            
                    <h4>AB- রক্তদাতার</h4>
                    @endif

                </div>

            </div> <!--  end .col-lg-3  -->


        </div> <!-- end row  -->
        <!-- secend Counter End -->

    </div> <!--  end .container  -->

</section> <!--  end .section-counter -->

<!--  GALLERY CONTENT  -->

<section class="section-content-block section-secondary-bg">

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">
                    @if(Session::get('language') == 'english')
                    {{ $homeTitleSetting->gallery_title_en }}
                    @else
                    {{ $homeTitleSetting->gallery_title_bn }}
                    @endif
                </h2>
                <p class="section-subheading">
                    @if(Session::get('language') == 'english')
                    {{ $homeTitleSetting->gallery_subtitle_en }}
                    @else
                    {{ $homeTitleSetting->gallery_subtitle_bn }}
                    @endif
                </p>
            </div> <!-- end .col-sm-10  -->                      


        </div> <!-- end .row  -->

    </div> <!--  end .container -->

    <div class="container-fluid wow fadeInUp">

        <div class="no-padding-gallery gallery-carousel">
        @foreach($photo_gallery as $row)
            <a class="gallery-light-box xs-margin" data-gall="myGallery" href="{{ asset('Backend/assets/media/photoGallery/'. $row->photo_gallery) }}">

                <figure class="gallery-img">

                    <img src="{{ asset('Backend/assets/media/photoGallery/'. $row->photo_gallery) }}" alt="gallery image" />

                </figure> <!-- end .cause-img  -->
        @endforeach
            </a> <!-- end .gallery-light-box  -->

        </div> <!-- end .row  -->

    </div><!-- end .container-fluid  -->

</section> <!-- end .section-content-block  -->

<!-- BLOG SECTION  -->

<section class="section-content-block section-home-blog section-pure-white-bg">

    <div class="container wow fadeInUp">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">
                    @if(Session::get('language') == 'english')
                    {{ $homeTitleSetting->blog_title_en }}
                    @else
                    {{ $homeTitleSetting->blog_title_bn }}
                    @endif
                </h2>
                <p class="section-subheading">
                    @if(Session::get('language') == 'english')
                    {{ $homeTitleSetting->blog_subtitle_en }}
                    @else
                    {{ $homeTitleSetting->blog_subtitle_bn }}
                    @endif
                </p>
            </div> <!-- end .col-md-12  -->

        </div> <!--  end .row  -->

        <div class="row">
          @foreach($posts as $row)
            <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

                <div class="latest-news-container"> 

                    <a href="{{ route('blood.post.view', $row->slug) }}">
                        <figure>
                            <img src="{{ asset('Backend/assets/media/posts/'.$row->image) }}" alt="{{ $row->image }}">
                        </figure>
                    </a>

                    <div class="news-content">

                        <h3>
                            <a href="{{ route('blood.post.view', $row->slug) }}">{{ $row->title }}</a>
                        </h3>

                        <div class="news-meta-info">
                            <i class="fa fa-clock-o"></i> {{ $row->created_at->diffForHumans() }} | {{ date('d-M-Y', strtotime($row->created_at)) }}
                        </div>                                

                        <div class="update-details">                                     
                            {!!  Illuminate\Support\Str::words($row->body, 30, '..') !!} 
                        </div>

                    </div>

                </div><!--  end .update-info  -->

            </div> <!--  end col-lg-4  -->
          @endforeach
        </div> <!-- end row  -->

        <div class="row">
            <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                <a href="{{ route('blood.post') }}" class="btn btn-load-more">
                    @if(Session::get('language') == 'english')
                   - See all news -
                    @else
                    - সব খবর দেখুন  -
                    @endif
                </a>
            </div>
        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!--  end .section-latest-blog -->
<br>
@endsection
