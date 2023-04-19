@extends('layouts.dashgestor')

@section('title', 'Dashboard - Cadastrar Postos')

@section('content')

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
        <input type="text" id="search" name="search" placeholder="Pesquise posto de combustíveis">
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
          <a class="nav-link collapsed" href="#">
            <i class="bi bi-exclamation-octagon"></i>
            <span>Logs de Atividade</span>
          </a>
        </li><!-- End posto Page Nav -->


      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/bomb/statistic">
          <i class="bi bi-bar-chart"></i>
          <span>Dados Estatísticos</span>
        </a>
      </li><!-- End statistic Page Nav -->

    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    
    <div class="pagetitle">
      <h1>Cadastrar Postos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Cadastrar Postos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Campos Com Validações</h5>
              <p>Todos os campos devem ser devidamente preenchido sem deixar alguma por preencher.</p>
              <hr><br> 
              <!-- Custom Styled Validation with Tooltips -->
              <form action="/bomb" class="row g-3 needs-validation" method="POST" novalidate>
                @csrf
                <h5 class="card-title">Informações de Identificação</h5>
                    <div class="col-md-4 position-relative form-floating mb-1">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Pumangol da Estação Norte" required>
                        <label for="nome">Nome*</label>
                    </div>
                    <div class="col-md-4 position-relative form-floating mb-1">
                        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Estação 12 Norte 24/24" required>
                        <label for="endereco">Endereço do Posto*</label>
                    </div>
                    <div class="col-md-4 position-relative mb-1">
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">+244</span>
                            <input type="text" class="form-control" name="contacto" id="contacto" placeholder="Contacto (Opcional)">
                            <div class="invalid-tooltip">
                            Por favor insira um contacto.
                            </div>
                        </div>
                    </div>
                <input type="hidden" name="empresa" value="{{ Auth::user()->empresas_id }}">
                <div class="row my-2 position-relative">
                    <h5 class="card-title">Hora de atendimento</h5>
                    <div class="col-md-6 mb-2">
                      <label for="abertura" class="col-sm-6 col-form-label">Iniçio*</label>
                      <input type="time" name="abertura" id="abertura" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                      <label for="fechamento" class="col-sm-6 col-form-label">Fim*</label>
                      <input type="time" name="fechamento" id="fechamento" class="form-control" required>
                    </div>
                </div>
                    <!-- Informações de Combustível -->

                <div class="row my-2 position-relative">
                    <h5 class="card-title">Disponibilidade de combustível</h5>
                    <div class="col-md-6 form-floating mb-1">
                      <select class="form-select" name="gas" id="gas" aria-label="Floating label select example">
                            <option value="0">Vazio</option>
                            <option value="1">Cheio</option>
                      </select>
                      <label for="gas">Nivel de Gasolina*</label>
                    </div>
                    <div class="col-md-6 form-floating mb-1">
                      <select class="form-select" name="gol" id="gol" aria-label="Floating label select example">
                            <option value="0">Vazio</option>
                            <option value="1">Cheio</option>
                      </select>
                      <label for="gas">Nivel de Gasóleo*</label>
                    </div>
                    
                </div>
                
                

                <hr>
                  <div class="row my-4 position-relative">
                      <h5 class="card-title">Informação de Localização</h5>
                      <div class="col-md-6">
                        <label for="lat">Latitude*</label>
                        <input type="text" class="form-control" name="lat" id="lat" placeholder="Ex: -25.494970" required>
                      </div>
                      <div class="col-md-6">
                        <label for="lng">Longitude*</label>
                        <input type="text" class="form-control" name="lng" id="lng" placeholder="Ex: -51.177143" required>
                      </div>
                  </div>
                          
                  <div class="col-12">
                    <h5 class="mb-0 card-title">Localização no mapa</h5>
                    <div class="card recent-sales overflow-auto text-center">
                          <!-- O Mapa -->
                          <!-- Google Maps -->
                          <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjggu3R39X8AhUXR8AKHTugDOcQFnoECBYQAQ&url=https%3A%2F%2Fwww.google.com%2Fmaps%2F%4041.3772304%2C-8.7591318%2C15z%3Fhl%3Dpt-PT&usg=AOvVaw3miTRpGE1Q-KtWfMCJnRUd" target="_blank" class="btn btn-secondary" rel="noopener noreferrer">Ir para o mapa</a>
                    </div>
                  </div>

                  <div class="col-12 text-end">
                    <button class="btn btn-primary" type="submit">Adicionar</button>
                  </div>
              </form><!-- End Custom Styled Validation with Tooltips -->

            </div>
          </div>

        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  @endsection('content')