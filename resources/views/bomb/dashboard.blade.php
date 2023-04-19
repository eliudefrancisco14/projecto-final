@extends('layouts.adminmain')
@section('title', 'Dashboard - AngoFuel Administrador')
@section('content')

@if(Auth::user()->acesso_id == 1)

<!-- content admin View-->
<!-- Header View-->
<main id="main" class="main">
        
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                  <div class="row">
                    <div class="col-xxl-4 col-md-6">
                      <div class="card info-card sales-card">

                        <div class="card-body">
                          <h5 class="card-title">Sessão <span>| Hoje</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totsession }}</h6>
                              <span class="text-success small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1">Sessões iniciadas</span>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                      <div class="card info-card sales-card">

                        <div class="card-body">
                          <h5 class="card-title">Postos <span>| Hoje</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="ri-map-pin-line"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totbomba }}</h6>
                              <span class="text-success small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1">Postos cadastrados</span>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="col-xxl-12 col-md-12">
                      <div class="card info-card sales-card">

                        <div class="card-body">
                          <h5 class="card-title">Usuários <span>| Hoje</span></h5>

                          <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                              <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                              <h6>{{ $totaluser }}</h6>
                              <span class="text-success small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1">Usuários cadastrados</span>

                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                
            </div><!-- End Recent Sales -->
            
            <!-- Recent Sales -->

            
          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

</main><!-- End #main -->
<!-- End content admin View-->

@elseif(Auth::user()->acesso_id == 2)

<!-- content User normal View-->
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
  
<!-- End content User normal View-->

@elseif(Auth::user()->acesso_id == 3)

<!-- content Gestor View-->

<main id="main" class="main">
        
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                      <h6>Filtro</h6>
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
  
<!-- End content Gestor View-->

@endif

@endsection('content')