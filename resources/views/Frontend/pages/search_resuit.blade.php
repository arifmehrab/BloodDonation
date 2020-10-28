@extends('layouts.app')
@section('title', 'Blood | Resuit')
@section('main_content')
<hr>
<div class="container">
    <h5><strong class="text-center">This Area Total Avaiable Donor:- {{ $search_resuit->count() }}</strong></h5>
@if($search_resuit->count() > 0)
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
            <p><a href="tel:{{ $row->phone_number }}" id="card_button">Call:- {{ $row->phone_number }}</a></p>
          </div>
    </div><!-- End colum -->
    @endforeach
</div><!-- End row -->
{{ $search_resuit->links() }}
@else
<h4>
    <strong class="text-danger text-center">
        রক্তদাতা পাওয়া যায়নি! দয়া করে আবার চেষ্টা করুন এবং আপনার নিকটবর্তী জায়গার নাম দিয়ে আবার চেষ্টা করুন।
        অথবা আমাদের মেসেজ করুন 
   </strong>
   <br>
   <br>
   <a class="btn btn-primary text-center" href="https://www.facebook.com/groups/Bdbloodservices">Join & Message</a>
</h4>
@endif
</div><!-- container -->
<br>
@endsection