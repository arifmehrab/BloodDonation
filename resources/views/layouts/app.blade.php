<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
      <!-- The styles -->
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css') }}"/>
      <link href="{{ asset('Frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
      <link href="{{ asset('Frontend/assets/css/animate.css') }}" rel="stylesheet" type="text/css" >
      <link href="{{ asset('Frontend/assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" >
      <link href="{{ asset('Frontend/assets/css/venobox.css') }}" rel="stylesheet" type="text/css" >
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/styles.css') }}" />
      <link rel="stylesheet" href="{{ asset('Frontend/assets/css/corestyle.css') }}" />
      @stack('css')
    
</head>
<body> 

    <div id="preloader">
        <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
    </div>

    <!-- Header -->
    @include('Frontend.partials.header')

    <!--- Main Content Area -->
    @yield('main_content')
 
    <!-- START FOOTER  -->
     @include('Frontend.partials.footer')
    <!-- END FOOTER  -->
    <a id="backTop">Back To Top</a>

    <script src="{{ asset('Frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/jquery.backTop.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/waypoints-sticky.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/venobox.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/custom-scripts.js') }}"></script>
    @stack('js')
</body>
</html>
