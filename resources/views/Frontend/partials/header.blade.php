@php 
$headerT_top_title = App\Models\homesettingone::select('header_top_title_en', 'header_top_title_bn')->first();
$top_donation_button = App\Models\home_title_setting::select('donation_button_en', 'donation_button_bn')->first();
$settings = App\Models\setting::select('logo', 'facebook_url', 'twitter_url', 'youtube_url')->first();
@endphp
<!--  HEADER -->
<header class="main-header clearfix">

    <div class="top-bar clearfix">

        <div class="container">

            <div class="row">
                <div class="col-md-7 col-sm-12">

                    <marquee scrollamount="3" behavior="scroll" direction="left"
					onmouseover="this.stop();"
                    onmouseout="this.start();">
                    @if(Session::get('language') == 'english'))
                        {{ $headerT_top_title->header_top_title_en }}
                    @else
                        {{ $headerT_top_title->header_top_title_bn }}
                    @endif
				   </marquee>

                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="top_button">
                        @if(Session::get('language') == 'english')
                        <a href="{{ route('bangla.language') }}" class="btn btn-info">Bangla</a>
                        @else
                        <a href="{{ route('english.language') }}" class="btn btn-info">English</a>
                        @endif
                        <a href="" class="btn btn-primary">
                          @if(Session::get('language') == 'english')
                          {{ $top_donation_button->donation_button_en  }}
                          @else
                          {{ $top_donation_button->donation_button_bn }}
                          @endif
                        </a>  
                       </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="top-bar-social">
                        @isset($settings->facebook_url)
                        <a href="{{ $settings->facebook_url }}"><i class="fa fa-facebook"></i></a>  
                        @endisset
                        @isset($settings->twitter_url)
                        <a href="{{ $settings->twitter_url }}"><i class="fa fa-twitter"></i></a>    
                        @endisset
                        @isset($settings->youtube_url)
                        <a href="{{ $settings->youtube_url }}"><i class="fa fa-youtube"></i></a>   
                        @endisset
                    </div> 
                </div> 

            </div>

        </div> <!--  end .container -->

    </div> <!--  end .top-bar  -->

    <section class="header-wrapper navgiation-wrapper">

        <div class="navbar navbar-default">			
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="{{ url('/') }}"><img alt="{{ $settings->logo }}" src="{{ asset('Backend/assets/media/logo/'. $settings->logo) }}"></a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="drop">
                            <a href="{{ url('/') }}" title="Home Layout 01">Home</a>
                        </li>
                        <li><a href="{{ route('about.us') }}" title="About Us">About Us</a></li>

                        <li>
                            <a href="{{ route('blood.summary') }}">Blood Summary</a>
                        </li>

                        <li>
                            <a href="#">Blog</a>
                            <ul class="drop-down">
                                <li><a href="blog.html">All Posts</a></li> 
                            </ul>
                        </li>
                        @guest
                        <li>
                            <button><a class="btn btn-primary" id="login" href="{{ url('/login') }}">Login</a></button>
                      
                        </li>
                        @else
                        <li>
                            <button><a class="btn btn-primary" id="userAccount" href="{{ route('user.dashboard') }}"><i class="fa fa-user"></i>My Account</a></button>
                      
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>

    </section>

</header> <!-- end main-header  -->