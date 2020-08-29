<!--  HEADER -->

<header class="main-header clearfix">

    <div class="top-bar clearfix">

        <div class="container">

            <div class="row">

                <div class="col-md-7 col-sm-12">

                    <p>Welcome to blood donation center.</p>

                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="top_button">
                        <a href="" class="btn btn-info">Bangla</a>
                        <a href="" class="btn btn-primary">DONATION FOR FOUR</a>  
                       </div>
                </div>
                <div class="col-md-2 col-sm-12">
                    <div class="top-bar-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
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
                    <a class="logo" href="{{ url('/') }}"><img alt="" src="{{ asset('Frontend/assets') }}/images/logo.png"></a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="drop">
                            <a href="{{ url('/') }}" title="Home Layout 01">Home</a>
                        </li>
                        <li><a href="about-us.html" title="About Us">About Us</a></li>

                        <li>
                            <a href="">Campaign</a>
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