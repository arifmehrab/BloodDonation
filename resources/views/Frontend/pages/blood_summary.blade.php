@extends('layouts.app')
@section('title', 'Blood | Blood-summary')
@section('main_content')
  <!--  PAGE HEADING -->

  <section class="page-header">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                <h3>
                    @if(Session::get('language') == 'english')
                    Know these things before donating blood!
                    @else
                    রক্ত দেওয়ার আগে এই বিষয়গুলো জেনে নিন!
                    @endif
                </h3>

                <br>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  --> 
<br>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
               <h3 class="text-center">RULES</h3>
               <hr>
                {!! $blood_summary->summery_rules !!}
               <br>
            </div>
        </div>
        <hr>
        
        <div class="row">
             <div class="col-md-6 col-sm-12">
                {!! $blood_summary->summery_section_one !!}
             </div>
             <div class="col-md-6 col-sm-12">
                {!! $blood_summary->summery_section_two !!} 
            </div>
        </div>

        <hr>
        <div class="row">
             <div class="col-md-6 col-sm-12">
                {!! $blood_summary->summery_section_three !!}
             </div>
             <div class="col-md-6 col-sm-12">
                {!! $blood_summary->summery_section_four !!} 
            </div>
        </div>
        <br><br>
    </div>
</section>
@endsection