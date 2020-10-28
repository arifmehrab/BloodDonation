@extends('layouts.app')
@section('title', 'Blood | Terms-of-Service')
@section('main_content')
  <!--  PAGE HEADING -->

  <section class="page-header">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                <h3>
                    Terms of Service
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
                   {!! $terms_of_service->terms_of_service !!}
                 </p>
             </div>
        </div> <!-- end .row  --> 

    </div> <!-- end .container  -->

</section> <!--  end .section-our-team --> 

@endsection