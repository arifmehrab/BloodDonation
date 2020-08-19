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
                    <a class="logo" href="index.html"><img alt="" src="{{ asset('Frontend/assets') }}/images/logo.png"></a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="drop">
                            <a href="index.html" title="Home Layout 01">Home</a>
                            <ul class="drop-down">
                                <li><a href="index.html" title="Home Layout 01">Home Layout 1</a></li>
                                <li><a href="home-2.html" title="Home Layout 02">Home Layout 2</a></li>
                            </ul>
                        </li>
                        <li><a href="about-us.html" title="About Us">About Us</a></li>

                        <li>
                            <a href="#">Campaign</a>
                            <ul class="drop-down">
                                <li><a href="events.html">All Campaigns</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">Blog</a>
                            <ul class="drop-down">
                                <li><a href="blog.html">All Posts</a></li> 
                            </ul>
                        </li>

                        <li>
                            <button><a class="btn btn-primary" id="login" href="{{ url('/login') }}">Login</a></button>
                            {{-- <span><a id="login" href="#" class="btn btn-primary" >My Profile</a></span> --}}
                      
                        </li>


                    </ul>
                </div>
            </div>
        </div>

    </section>

</header> <!-- end main-header  -->