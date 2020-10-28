 <!-- START FOOTER  -->
@php
    $footer_title = App\Models\home_title_setting::select('newsletter_summery_en', 'newsletter_summery_bn', 'about_text_en', 'about_text_bn')->first();
    $footer_setting = App\Models\setting::select('email', 'phone_number', 'address', 'copyright')->first();
@endphp
 <footer>            

    <section class="footer-widget-area footer-widget-area-bg">

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12">

                    <div class="footer-widget">
                        <div class="sidebar-widget-wrapper">
                            <div class="footer-widget-header clearfix">
                                @if(Session::get('language') == 'english')
                                <h3>Subscribe Us</h3>
                                @else
                                <h3>সাবস্ক্রাইব করুন</h3>
                                @endif
                            </div>
                            @if(Session::get('language') == 'english')
                            <p>
                               {{ $footer_title->newsletter_summery_en }}
                            </p>
                            @else
                            <p>
                                {{ $footer_title->newsletter_summery_bn }}
                             </p>
                            @endif
                            <div class="footer-subscription">
                                <form action="{{ route('subscriber.store') }}" method="POST">
                                    @csrf
                                    <p>
                                        <input id="mc4wp_email" class="form-control" required="" placeholder="Enter Your Email" name="email" type="email">
                                    </p>
                                    <p>
                                        <input class="btn btn-default" value="Subscribe Now" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>

                </div> <!--  end .col-md-4 col-sm-12 -->   						                      

                <div class="col-md-4 col-sm-6 col-xs-12">

                    <div class="footer-widget">

                        <div class="sidebar-widget-wrapper">

                            <div class="footer-widget-header clearfix">
                                @if(Session::get('language') == 'english')
                                <h3>CONTACT US</h3>
                                @else
                                <h3>যোগাযোগ করুন</h3>
                                @endif
                            </div>  <!--  end .footer-widget-header --> 


                            <div class="textwidget">                                       

                                <i class="fa fa-envelope-o fa-contact"></i> <p><a href="#">{{ $footer_setting->email }}</a></p>

                                <i class="fa fa-location-arrow fa-contact"></i> <p>{{ $footer_setting->address }}</p>

                                <i class="fa fa-phone fa-contact"></i> <p>{{ $footer_setting->phone_number }}</p>                              

                            </div>

                        </div> <!-- end .footer-widget-wrapper  -->

                    </div> <!--  end .footer-widget  -->

                </div> <!--  end .col-md-4 col-sm-12 -->   

                <div class="col-md-4 col-sm-12 col-xs-12">

                    <div class="footer-widget clearfix">

                        <div class="sidebar-widget-wrapper">

                            <div class="footer-widget-header clearfix">
                                @if(Session::get('language') == 'english')
                                <h3>ABOUT US</h3>
                                @else
                                <h3>আমাদের সম্পর্কে</h3>
                                @endif
                            </div>  <!--  end .footer-widget-header --> 
                            @if(Session::get('language') == 'english')
                            <p>{{ $footer_title->about_text_en }}</p>
                            @else
                            <p>{{ $footer_title->about_text_bn }}</p>
                            @endif
                        </div> <!--  end .footer-widget  -->        

                    </div> <!--  end .footer-widget  -->            

                </div> <!--  end .col-md-4 col-sm-12 -->    

            </div> <!-- end row  -->

        </div> <!-- end .container  -->

    </section> <!--  end .footer-widget-area  -->

    <!--FOOTER CONTENT  -->

    <section class="footer-contents">

        <div class="container">

            <div class="row clearfix">

                <div class="col-md-6 col-sm-12">
                    <p class="copyright-text">{{ $footer_setting->copyright }}</p>

                </div>  <!-- end .col-sm-6  -->

                <div class="col-md-6 col-sm-12 text-right">
                    <div class="footer-nav">
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{ route('terms.of.service') }}">Terms of Service</a>
                                </li>
                                <li>
                                    <a href="{{ route('privac.policy') }}">Privacy Policy</a>
                                </li>   
                                <li>
                                    <a href="{{ route('copy.wright.disclaimar') }}">DMCA / Copyrights Disclaimer</a>
                                </li> 
                            </ul>
                        </nav>
                    </div> <!--  end .footer-nav  -->
                </div> <!--  end .col-lg-6  -->

            </div> <!-- end .row  -->                                    

        </div> <!--  end .container  -->

    </section> <!--  end .footer-content  -->

</footer>

<!-- END FOOTER  -->