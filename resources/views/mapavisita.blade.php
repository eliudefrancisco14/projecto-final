<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Visualização de Visitante</title>
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

<body>
  <!-- Header View-->
  <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
          <img src="/assets/img/logo.png" alt="">
          <span class=" d-none d-lg-block">AngoFuel</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <nav class="header-nav ms-auto px-2">

      </nav><!-- End Icons Navigation -->

  </header>

  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">


      @if (Route::has('login'))
          @auth
              <li class="nav-item">
              <a class="nav-link " href="{{ url('/dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
              </li><!-- End Dashboard Nav -->
          @else

              <li class="nav-item">
              <a class="nav-link " href="/">
                  <i class="bi bi-grid"></i>
                  <span>Pagina Inicial</span>
              </a>
              </li><!-- End Dashboard Nav -->
              <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('login') }}">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Entrar</span>
              </a>
              </li><!-- End message Page Nav -->

              @if (Route::has('register'))
              <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('register') }}">
                  <i class="bi bi-person"></i>
                  <span>Cadastrar-se</span>
              </a>
              </li><!-- End statistic Page Nav -->
              @endif
          @endauth
      @endif

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/msgvisita') }}">
            <i class="bi bi-chat-left-text"></i>
            <span>Notificar</span>
        </a>
      </li><!-- End Dashboard Nav -->


    </ul>
  </aside><!-- End Sidebar-->
  <!-- Main View-->
  <main id="main" class="main">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">

          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">

              <!-- Recent Sales -->
              <div class="col-12">
                  
                <div class="card recent-sales overflow-auto">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
                  <!--
                  <div>
                    <iframe style="border: 0; width: 100%; height: 460px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
                  </div> End Google Maps -->
                  
                  <!--O mapa do projecto--> 
                  <div id="map" style="border: 0; width: 100%; height: 740px;"></div>
                  <!--O código do mapa do projecto-->
                    @include('map.mapa')
                </div>
              </div><!-- End Recent Sales -->

            </div>
          </div><!-- End Left side columns -->


        </div>
      </section>

  </main><!-- End #main -->
    
  <!-- End content admin View-->

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
