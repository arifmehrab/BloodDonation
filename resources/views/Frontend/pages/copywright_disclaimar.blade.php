@extends('layouts.app')
@section('title', 'Blood | Copyrights-Disclaimer')
@section('main_content')
  <!--  PAGE HEADING -->

  <section class="page-header">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                <h3>
                    DMCA / Copyrights Disclaimer
                </h3>

                <br>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<!-- About us content -->
<section class="section-content-block section-our-team">

    <div class="container wow fadeInUp">

        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12">
                 <p>
                    {!! $copywright_dsc->copywright_disclaimar !!}
                 </p>
             </div>
        </div> <!-- end .row  --> 

    </div> <!-- end .container  -->

</section> <!--  end .section-our-team --> 

@endsection