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


</head>

@if(Auth::user()->acesso_id == 1)

<!-- Header View-->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="/" class="logo d-flex align-items-center">
      <img src="/assets/img/logo.png" alt="">
      <span class=" d-none d-lg-block">AngoFuel</span>
    </a>
    <i class="bi bi-list-task toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar datatable">
    <form class="search-form d-flex align-items-center" method="GET" action="/bomb/posto">
      <input type="text" id="search" name="search" placeholder="Pesquisar aqui">
      <button type="submit" title="Busque"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto px-2">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">{{ $totalmsg }}</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              Voce tem {{ $totalmsg }} Mensagens Novas
              <a href="/bomb/mensagem"><span class="badge rounded-pill bg-primary p-2 ms-2">Ver todas</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            @foreach($mensagem as $mensagems)
              <li class="message-item">
                <a href="#">
                  <img src="\assets\img\profile-log.jpg" alt="" class="rounded-circle">
                  <div>
                    @foreach($usuarios as $usergerals)
                      @if($mensagems->user_id == $usergerals->id)
                        <h4>{{ $usergerals->name }}</h4>
                      @endif
                    @endforeach
                    
                    <p>{{ $mensagems->conteudo }}</p>
                    <p>4 hrs.</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endforeach

            <li class="dropdown-footer">
              <a href="/bomb/mensagem">Ver todas mensagens</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          @if(isset(Auth::user()->profile_photo_path))
          <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
          @else
          <img src="\assets\img\profile-log.jpg" alt="{{ Auth::user()->name }}" class="rounded-circle">
          @endif
          <span class="d-none d-md-block dropdown-toggle ps-2">Perfil</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ Auth::user()->name }}</h6>
            <span>{{ __('Administrador') }}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
              <i class="bi bi-person"></i>
              <span>{{ __('Profile') }}</span>
            </a>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
          <form action="/logout" method="POST"> 
            @csrf 
              <a class="dropdown-item d-flex align-items-center" href="/logout" onclick="event.preventDefault();
              this.closest('form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </form>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header View-->

<!-- Aside View-->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-heading">Pages</li>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#opcoes-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Gerenciar</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="opcoes-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="/adminfolder/userfolder/userlogado">
            <i class="bi bi-circle"></i><span>Usuários</span>
          </a>
        </li>
        <li>
          <a href="/adminfolder/empresafolder/empresas">
            <i class="bi bi-circle"></i><span>Empresas</span>
          </a>
        </li>
        <li>
          <a href="/adminfolder/gestorfolder/gestor">
            <i class="bi bi-circle"></i><span>Gestor</span>
          </a>
        </li>
        <li>
          <a href="/bomb/posto">
            <i class="bi bi-circle"></i><span>Postos</span>
          </a>
        </li>
      </ul>
    </li><!-- End Opcoes Nav -->
    <li class="nav-item dropdown">

  </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="/bomb/mensagem">
        <i class="bi bi-chat-left-text"></i>
        <span>Mensagens</span>
      </a>
    </li><!-- End message Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="/bomb/log">
        <i class="bi bi-exclamation-octagon"></i>
        <span>Logs de Atividade</span>
      </a>
    </li><!-- End posto Page Nav -->
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="/bomb/statistic">
        <i class="bi bi-bar-chart"></i>
        <span>Dados Estatísticos</span>
      </a>
    </li><!-- End statistic Page Nav -->

  </ul>
</aside><!-- End Sidebar-->

@elseif(Auth::user()->acesso_id == 3)

<!-- Header View-->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="/" class="logo d-flex align-items-center">
      <img src="/assets/img/logo.png" alt="">
      <span class=" d-none d-lg-block">AngoFuel</span>
    </a>
    <i class="bi bi-list-task toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar datatable">
    <form class="search-form d-flex align-items-center" method="GET" action="/bomb/posto">
      <input type="text" id="search" name="search" placeholder="Pesquisar aqui">
      <button type="submit" title="Busque"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto px-2">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          @if(isset(Auth::user()->profile_photo_path))
          <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
          @else
          <img src="\assets\img\profile-log.jpg" alt="{{ Auth::user()->name }}" class="rounded-circle">
          @endif
          <span class="d-none d-md-block dropdown-toggle ps-2">Perfil</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ Auth::user()->name }}</h6>
            <span>{{ __('Gestor') }}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
              <i class="bi bi-person"></i>
              <span>{{ __('Profile') }}</span>
            </a>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
          <form action="/logout" method="POST"> 
            @csrf 
              <a class="dropdown-item d-flex align-items-center" href="/logout" onclick="event.preventDefault();
              this.closest('form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </form>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header>
<!-- Aside View-->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/bomb/posto">
          <i class="bi bi-geo-alt"></i>
          <span>Postos</span>
        </a>
      </li><!-- End posto Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/userdir/mensagem">
          <i class="bi bi-chat-left-text"></i>
          <span>Notificar</span>
        </a>
      </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="/bomb/statistic">
        <i class="bi bi-bar-chart"></i>
        <span>Dados Estatísticos</span>
      </a>
    </li><!-- End statistic Page Nav -->

  </ul>
</aside><!-- End Sidebar-->

@endif

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