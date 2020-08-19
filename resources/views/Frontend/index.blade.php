@extends('layouts.app')
@section('title', 'Home | Blood')
@section('main_content')
@include('Frontend.partials.blood_search')
<!-- SECTION CTA  -->   

<section class="cta-section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <h2>We are helping people from 40 years</h2>
                <p>
                    You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                </p>
                <a class="btn btn-cta-2" href="#">Join Blood Donation</a>
            </div> <!--  end .col-md-8  -->
        </div> <!--  end .row  -->
    </div>
</section> 

<!--  SECTION DONATION PROCESS -->

<section class="section-content-block section-process">

    <div class="container">

        <div class="row">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading"><span>Donation</span> Process</h2>
                <p class="section-subheading">The donation process from the time you arrive center until the time you leave</p>
            </div> <!-- end .col-sm-10  -->                    

        </div> <!--  end .row  -->

        <div class="row wow fadeInUp">

            <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

                <div class="process-layout">

                    <figure class="process-img">

                        <img src="images/process_1.jpg" alt="service" />
                        <div class="step">
                            <h3>1</h3>
                        </div>
                    </figure> <!-- end .cause-img  -->

                    <article class="process-info">
                        <h2>Registration</h2>   
                        <p>You need to complete a very simple registration form. Which contains all required contact information to enter in the donation process.</p>
                    </article>

                </div> <!--  end .process-layout -->

            </div> <!--  end .col-lg-3 -->



            <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

                <div class="process-layout">

                    <figure class="process-img">
                        <img src="images/process_2.jpg" alt="process" />
                        <div class="step">
                            <h3>2</h3>
                        </div>
                    </figure> <!-- end .cau<h5 class="step">1</h5>se-img  -->

                    <article class="process-info">                                   
                        <h2>Screening</h2>
                        <p>A drop of blood from your finger will take for simple test to ensure that your blood iron levels are proper enough for donation process.</p>
                    </article>

                </div> <!--  end .process-layout -->

            </div> <!--  end .col-lg-3 -->


            <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

                <div class="process-layout">

                    <figure class="process-img">
                        <img src="images/process_3.jpg" alt="process" />
                        <div class="step">
                            <h3>3</h3>
                        </div>
                    </figure> <!-- end .cause-img  -->

                    <article class="process-info">
                        <h2>Donation</h2>
                        <p>After ensuring and passed screening test successfully you will be directed to a donor bed for donation. It will take only 6-10 minutes.</p>
                    </article>

                </div> <!--  end .process-layout -->

            </div> <!--  end .col-lg-3 -->

        </div> <!--  end .row --> 

    </div> <!--  end .container  -->

</section> <!--  end .section-process -->

 <!--  SECTION COUNTER   -->

 <section class="section-counter"  data-stellar-background-ratio="0.3">

    <div class="container wow fadeInUp">

        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-heartbeat icon"></i>
                    <span class="counter">2578</span>                            
                    <h4>Success Smile</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-stethoscope icon"></i>
                    <span class="counter">3235</span>                            
                    <h4>Happy Donors</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-users icon"></i>
                    <span class="counter">3568</span>                             
                    <h4>Happy Recipient</h4>

                </div>

            </div> <!--  end .col-lg-3  -->

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">

                <div class="counter-block-1 text-center">

                    <i class="fa fa-building icon"></i>
                    <span class="counter">1364</span>                            
                    <h4>Total Awards</h4>

                </div>

            </div> <!--  end .col-lg-3  -->


        </div> <!-- end row  -->

    </div> <!--  end .container  -->

</section> <!--  end .section-counter -->

<!--  APPOINTMENT SECTION -->

<section class="section-appointment">

    <div class="container wow fadeInUp">

        <div class="row">

            <div class="col-lg-6 col-md-6 hidden-sm hidden-xs"> 

                <figure class="appointment-img">
                    <img src="images/appointment.jpg" alt="appointment image">
                </figure>
            </div> <!--  end col-lg-6  -->


            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 

                <div class="appointment-form-wrapper text-center clearfix">
                    <h3 class="join-heading">Request Appointment</h3>
                    <form class="appoinment-form"> 
                        <div class="form-group col-md-6">
                            <input id="your_name" class="form-control" placeholder="Name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input id="your_email" class="form-control" placeholder="Email" type="email">
                        </div>
                        <div class="form-group col-md-6">
                            <input id="your_phone" class="form-control" placeholder="Phone" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="select-style">                                    
                                <select class="form-control" name="your_center">
                                    <option>Donation Center</option>
                                    <option>Los Angles</option>
                                    <option>California</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <input id="your_date" class="form-control" placeholder="Date" type="text">
                        </div>


                        <div class="form-group col-md-6">
                            <input id="your_time" class="form-control" placeholder="Time" type="text">
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea id="textarea_message" class="form-control" rows="4" placeholder="Your Message..."></textarea>
                        </div>                                                          

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <button id="btn_submit" class="btn-submit" type="submit">Get Appointment</button>
                        </div>

                    </form>

                </div> <!-- end .appointment-form-wrapper  -->

            </div> <!--  end .col-lg-6 -->

        </div> <!--  end .row  -->

    </div> <!--  end .container -->

</section>  <!--  end .appointment-section  -->

<!--  GALLERY CONTENT  -->

<section class="section-content-block section-secondary-bg">

    <div class="container">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Photo Gallery</h2>
                <p class="section-subheading">Campaign photos of different parts of world and our prestigious voluntary work</p>
            </div> <!-- end .col-sm-10  -->                      


        </div> <!-- end .row  -->

    </div> <!--  end .container -->

    <div class="container-fluid wow fadeInUp">

        <div class="no-padding-gallery gallery-carousel">

            <a class="gallery-light-box xs-margin" data-gall="myGallery" href="images/gallery_1.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_1.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a> <!-- end .gallery-light-box  -->

            <a class="gallery-light-box xs-margin"  data-gall="myGallery" href="images/gallery_2.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_2.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a>

            <a class="gallery-light-box xs-margin" data-gall="myGallery" href="images/gallery_3.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_3.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a> <!-- end .gallery-light-box  -->

            <a class="gallery-light-box xs-margin"  data-gall="myGallery" href="images/gallery_4.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_4.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a>

            <a class="gallery-light-box xs-margin" data-gall="myGallery" href="images/gallery_5.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_5.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a> <!-- end .gallery-light-box  -->

            <a class="gallery-light-box xs-margin"  data-gall="myGallery" href="images/gallery_6.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_6.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a>

            <a class="gallery-light-box xs-margin" data-gall="myGallery" href="images/gallery_7.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_8.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a> <!-- end .gallery-light-box  -->

            <a class="gallery-light-box xs-margin"  data-gall="myGallery" href="images/gallery_8.jpg">

                <figure class="gallery-img">

                    <img src="images/gallery_7.jpg" alt="gallery image" />

                </figure> <!-- end .cause-img  -->

            </a>

        </div> <!-- end .row  -->

    </div><!-- end .container-fluid  -->

</section> <!-- end .section-content-block  -->

<!-- BLOG SECTION  -->

<section class="section-content-block section-home-blog section-pure-white-bg">

    <div class="container wow fadeInUp">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">Recent Blog</h2>
                <p class="section-subheading">
                    Latest news and statements regarding giving blood, blood processing and supply.
                </p>
            </div> <!-- end .col-md-12  -->

        </div> <!--  end .row  -->

        <div class="row">

            <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

                <div class="latest-news-container"> 

                    <a href="#">
                        <figure>
                            <img src="images/blog_thumb_1.jpg" alt="latest news">
                        </figure>
                    </a>

                    <div class="news-content">

                        <h3>
                            <a href="#">Blood Connects Us All in a Soul</a>
                        </h3>

                        <div class="news-meta-info">
                            <i class="fa fa-clock-o"></i> April 4, 2017
                            &nbsp; <i class="fa fa-comment-o"></i> 10 Comments
                        </div>                                

                        <div class="update-details">                                     
                            In many countries, demand exceeds supply, and blood services face the challenge of making blood available for patient. 
                        </div>

                    </div>

                </div><!--  end .update-info  -->

            </div> <!--  end col-lg-4  -->

            <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

                <div class="latest-news-container"> 

                    <a href="#">
                        <figure>
                            <img src="images/blog_thumb_2.jpg" alt="latest news">
                        </figure>
                    </a>

                    <div class="news-content">

                        <h3>
                            <a href="#">Give Blood and Save three Lives</a>
                        </h3>

                        <div class="news-meta-info">
                            <i class="fa fa-clock-o"></i> April 4, 2017
                            &nbsp; <i class="fa fa-comment-o"></i> 10 Comments
                        </div>                                

                        <div class="update-details">                                    
                            To save a life, you don’t need to use muscle. By donating just one unit of blood, you can save three lives or even several lives.
                        </div>

                    </div>

                </div><!--  end .update-info  -->

            </div> <!--  end col-lg-4  -->

            <div class="col-lg-4 col-md-offset-0 col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">

                <div class="latest-news-container"> 

                    <a href="#">
                        <figure>
                            <img src="images/blog_thumb_3.jpg" alt="latest news">
                        </figure>
                    </a>

                    <div class="news-content">

                        <h3>
                            <a href="#">Why Should I donate Blood ?</a>
                        </h3>

                        <div class="news-meta-info">
                            <i class="fa fa-clock-o"></i> April 4, 2017
                            &nbsp; <i class="fa fa-comment-o"></i> 10 Comments
                        </div>                                

                        <div class="update-details">
                            Blood is the most precious gift that anyone can give to another person.Donating blood not only saves the life also donors.
                        </div>

                    </div>

                </div><!--  end .update-info  -->

            </div> <!--  end col-lg-4  -->

        </div> <!-- end row  -->

        <div class="row">
            <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                <a href="#" class="btn btn-load-more">- Load More Blog -</a>
            </div>
        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!--  end .section-latest-blog -->
@endsection
