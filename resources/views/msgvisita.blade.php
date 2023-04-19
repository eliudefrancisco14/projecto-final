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
<!-- Main de Visita-->
<main id="main" class="main">
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle">
      <h1>Notificar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Notificar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Notificar Alguma coisa</h5>
              <hr><br> 
              <!-- Custom Styled Validation with Tooltips -->
              <form action="/msgvisita/create" class="row g-3 needs-validation" method="POST" novalidate>
                @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-6 position-relative form-floating mb-1">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Ex: António João" required>
                            <label for="nome">Nome*</label>
                        </div>
                        <div class="col-md-6 position-relative form-floating mb-1">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Estação 12 Norte 24/24" required>
                            <label for="email">E-mail*</label>
                        </div>
                        <div class="col-sm-12">
                            <textarea name="messages" id="messages" class="form-control" minlength=10 maxlength=500 style="height: 100px" placeholder="Escreva o que estiver a pensar..." required></textarea>
                            <div class="invalid-feedback">Por favor, digita alguma coisa!</div>
                            <div class="invalid-feedback">O campo deve conter no mínimo 10 caractéres e máximo 500 caractéres!</div>
                        </div>
                    </div>
                  <div class="col-12 text-end">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                  </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
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