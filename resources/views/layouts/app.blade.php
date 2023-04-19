<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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



        <title>{{ config('app.name', 'Angofuel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

        <header id="header" class="header mb-5 d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="/assets/img/logo.png" alt="">
                <span class=" d-none d-lg-block">AngoFuel</span>
            </a>
            <i class="bi bi-list-task toggle-sidebar-btn"></i>
            </div><!-- End Logo -->


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

        </header>
        <div class="container">
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </nav>
        </div>
        

<div class="mt-5">

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    @stack('modals')
    @livewireScripts

</div>
        

        

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
        <script src="/assets_dash/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="/assets_dash/vendor/tinymce/tinymce.min.js"></script>
        <script src="/assets_dash/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="/assets_dash/js/main.js"></script>

    </body>
</html>
