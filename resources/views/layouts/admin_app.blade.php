<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('Backend/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Data table css -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <!-- Toastr CSS -->
    <link href="{{ asset('Backend/assets/toster-js/css/toastr.css') }}" rel="stylesheet">
    <!-- sweetalert2 CSS -->
    <link href="{{ asset('Backend/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- summernotes CSS -->
    <link href="{{ asset('Backend/assets/vendor/summernote/dist/summernote-bs4.css') }}" rel="stylesheet" />
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/css/argon.css?v=1.1.0') }}" type="text/css">
  @stack('css')
</head>

<body>
  <!--- Sidevar  start --->
   @include('Backend.Admin.partials.sidebar')
  <!--  End Sidevar -->
   <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Top Navigation Bar -->
    @include('Backend.Admin.partials.header_top')
    <!--- Content Head --->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        @yield('content_head')
      </div>
    </div>
    <!--- Content Body --->
    <div class="container-fluid mt--6">
        <div class="row">
          <div class="col">
            <div class="card">
              @yield('content_body')
            </div>
          </div>
        </div>
        @include('Backend.Admin.partials.footer')
      </div><!-- End Content -->
    </div><!--- End Main Content -->
  <!-- Core -->
  <script src="{{ asset('Backend/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Data Table -->
  <script src="{{ asset('Backend/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
   <!-- Optional JS -->
    <script src="{{ asset('Backend/assets/vendor/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('Backend/assets/js/argon.js?v=1.1.0') }}"></script>
  <!--- Toastr js Start --->
  <script src="{{ asset('Backend/assets/toster-js/js/toastr.js') }}"></script>
  <!-- Sweet-Alert  -->
  <script src="{{ asset('Backend/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendor/sweetalert2/sweet-alert.init.js') }}"></script>
  <!-- Summernote Editor -->
 <script src="{{ asset('Backend/assets/vendor/summernote/dist/summernote-bs4.min.js') }}"></script>
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
    <!--- Sweet-Alert --->
    <script type="text/javascript">
        function deleteItem(id){
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'mr-2 btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You Want to Delete This!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        event.preventDefault();
                        document.getElementById('delete_form_'+id).submit();
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your Data is Save :)',
                            'error'
                        )
                    }
                })
        }

    </script>
    <!--- Summery Editor Script --->
    <script>
        jQuery(document).ready(function() {
    
            $('.summernote').summernote({
                height: 250, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
    
            $('.inline-editor').summernote({
                airMode: true
            });
    
        });
    
        window.edit = function() {
                $(".click2edit").summernote()
            },
            window.save = function() {
                $(".click2edit").summernote('destroy');
            }
    </script>
</body>
</html>