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
      <!-- Toastr CSS -->
      <link href="{{ asset('Backend/assets/toster-js/css/toastr.css') }}" rel="stylesheet">
      <!-- sweetalert2 CSS -->
      <link href="{{ asset('Backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
      @stack('css')
    
</head>
<body> 

    <div id="preloader">
        <span class="margin-bottom"><img src="{{ asset('Frontend/assets') }}/images/loader.gif" alt="" /></span>
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
    <!--- Toastr js Start --->
    <script src="{{ asset('Backend/assets/toster-js/js/toastr.js') }}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('Backend/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendor/sweetalert2/sweet-alert.init.js') }}"></script>
    @stack('js')    
     <!--- Toastr Message --->
    <script>
        @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <!--- Laravel validation Message By Toaster --->
    <script type="text/javascript">
        @if($errors->any())
            @foreach($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error', {
                closeButton:true,
                progressBar:true,
            });
            @endforeach
        @endif
    </script>
    <!--- test ajax search --->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(document).on('keyup', '.local_area', function(){
                var value = $(this).val();
                if( value != '' ) {
                    $.ajax({
                    url: "{{ route('area.search') }}",
                    type: "GET",
                    data: {value:value},
                    success:function(data) {
                        $('#show_area').show();
                        var html = "";
                        $.each(data, function(key, v){
                            html+= "<tr><td>"+v.name+"<td></tr>";
                        });
                        $('#area_value').html(html);  
                        console.log(data); 
                    }
                });
                } else {
                    $('#show_area').hide();
                }
            });
        });

    </script>
    
    <!--- Show District By Ajax In Search Filed --->
    <script type="text/javascript">
         jQuery(document).ready(function($) {
             $(document).on('change', '.divition', function(){
                var divition_id = $(this).val();
                $.ajax({
                    url: "{{ route('search.district.show') }}",
                    type: "GET",
                    data: {divition_id:divition_id},
                    success:function(data) {
                        var html = '<option value=""> -- Select Your District -- </option>';
                        $.each(data, function(key, v){
                            html+= '<option value="'+v.id+'">'+v.district_name+'</option>';
                        });
                       $('.district').html(html);
                    }
                });
             });
         });
    </script>
<!-- Show Upazila For search & Register Filed ----->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(document).on('change', '.district', function(){
            var district_id = $(this).val();
            $.ajax({
               url: "{{ route('show.upazila') }}",
               type: "GET",
               data: {district_id:district_id},
               success:function(data){
                  var html = '<option value="">-- Select Your Upazila --</option>';
                  $.each(data, function(key, v){
                      html+= '<option value="'+v.upazila+'">'+v.upazila+'</option>';
                  });
                  $('.upazila').html(html);
               }
            });
        });
   }); 
</script> 
</body>
</html>
