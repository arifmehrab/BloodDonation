@extends('layouts.app')
@section('title', 'Blood | Resuit')
@section('main_content')
<hr>
<div class="container">
<div class="row">
    @foreach($search_resuit as $row)
    <div class="col-md-3 col-sm-6">
        <div class="card card_style">
            <img src="
            @if($row->profile == NULL)
            {{ asset('Frontend/assets/media/avator/avator.png') }}
            @else
            {{ asset('Frontend/assets/media/avator/'.$row->profile) }}
            @endif
            " 
            alt="{{ $row->profile }}" style="width:100%; height:175px;">
            <p><strong>Name:- </strong>{{ $row->name }}</p>
            <p><strong>Blood Group:- </strong>{{ $row->blood_group }}</p>
            <p><strong>Divition(বিভাগ):-</strong> {{ $row->divition_name }}</p>
            <p><strong>District(জেলা):-</strong> {{ $row->district_name }}</p>
            <p><strong>Upazila(থানা):-</strong> {{ $row->upazila }}</p>
            <p><strong>Local Area(ইউনিয়ন):-</strong> {{ $row->local_area }}</p>
            <p><strong>Mobile:-</strong> {{ $row->phone_number }}</p>
            <p><a href="tel:{{ $row->phone_number }}" id="card_button">Call Now</a></p>
          </div>
    </div><!-- End colum -->
    @endforeach
</div><!-- End row -->
</div><!-- container -->
<br>
@endsection