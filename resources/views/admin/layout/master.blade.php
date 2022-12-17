<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('admin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">
  <script src="{{ asset('themeAdmin/js/jquery.min.js') }}"></script>
  <script src="{{ asset('themeAdmin/js/popper.min.js') }}"></script>
  <script src="{{ asset('themeAdmin/js/bootstrap.min.js') }}"></script>
  <!-- wow animation -->
  <script src="{{ asset('themeAdmin/js/animate.js') }}"></script>
  <!-- select country -->
  <script src="{{ asset('themeAdmin/js/bootstrap-select.js') }}"></script>

   <!-- phi country -->
  <script src="{{ asset('themeAdmin/ckeditor/ckeditor.js') }}"></script>
  <script>
      CKEDITOR.replace('ckeditor');
      CKEDITOR.replace('ckeditor1');
  </script>
   <!-- end phi -->

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->

    @include('admin.includes.header')

  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('admin.includes.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">




    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section id="main-footer">
  @include('admin.includes.footer')
  </section>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admin/assets/js/main.js')}}"></script>

  <!-- Jquery thảo -->
  <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>


    <script src="{{ asset('themeAdmin/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('themeAdmin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('themeAdmin/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('themeAdmin/js/utils.js') }}"></script>
    <script src="{{ asset('themeAdmin/js/analyser.js') }}"></script>
    <script src="{{ asset('themeAdmin/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="{{ asset('themeAdmin/js/custom.js') }}"></script>
    <script src="{{ asset('themeAdmin/js/chart_custom_style1.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('AdminTheme/ckeditor/ckeditor.js') }}"></script> <!-- END THEME JS -->
    <script src="{{ asset('assets/js/uploadFile.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    @php
   if(Session::has('message')){
    @endphp
    Swal.fire({
        position: 'top-end',
        // icon: 'success',
        icon: "{{ Session::get('alert-type') }}",
        title: "{{ Session::get('message') }}",
        showConfirmButton: false,
        timer: 1500
    })
    @php
   }
    @endphp
//    @php
//    if(Session::has('message')){
//    @endphp
//         const Toast = Swal.mixin({
//         toast: true,
//         position: 'top-end',
//         showConfirmButton: false,
//         timer: 3000,
//         timerProgressBar: true,
//         didOpen: (toast) => {
//             toast.addEventListener('mouseenter', Swal.stopTimer)
//             toast.addEventListener('mouseleave', Swal.resumeTimer)
//             }
//         })
//         Toast.fire({
//         icon: 'success',
//         title: 'Signed in successfully'
//         })
//     @php
//  }
//     @endphp
</script>
{{-- end thao --}}
</body>
</html>
