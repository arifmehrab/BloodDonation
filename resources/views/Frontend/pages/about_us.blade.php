@extends('layouts.app')
@section('title', 'Blood | About-us')
@section('main_content')
  <!--  PAGE HEADING -->

  <section class="page-header">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                <h3>
                    @if(Session::get('language') == 'english')
                    About Us
                    @else
                    আমাদের সম্পর্কে
                    @endif
                </h3>

                <br>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<!-- About us content -->
<section class="section-content-block section-our-team">

    <div class="container wow fadeInUp">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                @if(Session::get('language') == 'english')
                <h2 class="section-heading">ABOUT US</h2>
                @else
                <h2 class="section-heading">আমাদের সম্পর্কে</h2>
                @endif
            </div> <!-- end .col-sm-10  -->                      

        </div> <!-- end .row  -->
         <br>
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12">
                 <p>
                    {!! $about_content->about_content !!}
                 </p>
             </div>
        </div> <!-- end .row  --> 

    </div> <!-- end .container  -->

</section> <!--  end .section-our-team --> 

<!-- TEAM SECTION -->

<section class="section-content-block section-our-team">

    <div class="container wow fadeInUp">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                @if(Session::get('language') == 'english')
                <h2 class="section-heading">Our Team Member</h2>
                @else
                <h2 class="section-heading">আমাদের দলের সদস্য</h2>
                @endif
            </div> <!-- end .col-sm-10  -->                      

        </div> <!-- end .row  -->
         <br>
        <div class="row">
        @foreach($ourteam as $row)
            <div class="col-lg-3 col-md-offset-0 col-md-3 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

                <div class="team-layout-1">       

                    <figure class="team-member">
                        <a href="#" title="ALEXANDER GARY">
                            <img src="{{ asset('Backend/assets/media/ourteam/'.$row->image) }}" alt="{{ $row->image }}"/>
                        </a>

                    </figure> <!-- end. team-member  -->

                    <article class="team-info">
                        <h3>{{ $row->name }}</h3>                                   
                        <h4>{{ $row->sub_title }}</h4>
                    </article>

                    <div class="team-content">

                        <div class="team-social-share text-center clearfix">
                            <a class="fa fa-facebook rectangle" href="{{ $row->facebook_url }}" title="Facebook"></a>
                            <a class="fa fa-mobile rectangle" href="tel:{{ $row->mobile_number }}" title="Call Now"></a>
                        </div> <!-- end .author-social-box  -->

                    </div>                             

                </div> <!--  end team-layout-1 -->

            </div> <!--  end .col-md-4 col-sm-12  -->
        @endforeach

        </div> <!-- end .row  --> 

    </div> <!-- end .container  -->

</section> <!--  end .section-our-team -->  
@endsection