<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> -->

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">


  </head>

<body>

  
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="/assets/img/logo.png" alt=""> -->
        <h1>AngoFuel</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
              <ul>
                  @auth
                      <li><a href="/">Home</a></li>
                      <li><a href="/about">Sobre</a></li>
                      <li><a href="{{ url('/dashboard') }}" class="get-a-quote">Dashboard</a></li>
                  @else
                      <li><a href="/">Home</a></li>
                      <li><a href="/about">Sobre</a></li>
                      <li><a href="{{ route('login') }}" class="get-a-quote">Entrar</a></li>
                      
                      @if (Route::has('register'))
                          <li><a href="{{ route('register') }}" class="btn btn-link">Cadastrar</a></li>
                      @endif
                  @endauth
              </ul>
            </div>
        @endif
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  <!-- End Header -->

<!-- Hero Section -->



@yield('content')


<!-- End Hero Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.php" class="logo d-flex align-items-center">
            <span>AngoFuel</span>
          </a>
          <p>O seu sistema de Geolocalização de Bombas de Combustível mais conhecido tecnicamente como AngoFuel, é o sistema que irá te permitir localizar calcular rota rapidamente de uma bomba de combustível.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
        </div>
        <div class="col-lg-2 col-6 footer-links">
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contacte-nos</h4>
          <p>
            Cazenga, Sonef, Condomínio da Sonef casa nº40<br>
            Viana, Vila<br>
            Angola, Luanda <br><br>

            <strong><i style="font-size: 25px;" class="bi-person-lines-fill"></i></strong> +244 923 456 781<br>
            <strong><i style="font-size: 25px;" class="bi-at"></i></strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>AngoFuel</span></strong>. Todos os Direitos Reservados.
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div> 

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>
</html>