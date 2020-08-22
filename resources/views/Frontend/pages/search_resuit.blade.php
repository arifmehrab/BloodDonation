@extends('layouts.app')
@section('title', 'Blood | Resuit')
@section('main_content')
<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="card">
            <img src="{{ asset('Frontend/assets/team2.jpg') }}" alt="John" style="width:100%">
            <h1>John Doe</h1>
            <p class="title">CEO & Founder, Example</p>
            <p>Harvard University</p>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <p><button>Contact</button></p>
          </div>
    </div><!-- End colum -->
</div><!-- End row -->
@endsection