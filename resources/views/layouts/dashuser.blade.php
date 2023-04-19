<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets_dash/img/favicon.png" rel="icon">
  <link href="/assets_dash/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets_dash/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets_dash/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets_dash/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets_dash/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets_dash/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets_dash/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets_dash/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets_dash/css/style.css" rel="stylesheet">

  <!-- Link do mapa 
  <style>
    #map {
      height: 100%;
    }
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    .itel {
  max-height: 80px;
  margin-right: 6px;
  width: 80px;
    }
  </style>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3vhl_f3wKssqMMdazuuW20KkvVsOnhzs&callback=initMap">
  </script>
-->

</head>

<!-- ======= Conteudo ======= -->

@yield('content')

<!-- ======= End Conteudo ======= -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>AngoFuel</span></strong>. Todos os Direitos Reservados.
    </div>
    
  </footer><!-- End Footer -->


    
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets_dash/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets_dash/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets_dash/vendor/chart.js/chart.min.js"></script>
  <script src="/assets_dash/vendor/echarts/echarts.min.js"></script>
  <script src="/assets_dash/vendor/quill/quill.min.js"></script>
  <script src="/assets_dash/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets_dash/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets_dash/js/main.js"></script>

  </body>

</html>