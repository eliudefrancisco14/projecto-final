@extends('layouts.usermain')

@section('title', 'AngoFuel - Entrar com uma conta')

@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Sobre</h2>
              <p>Este sistema foi desenvolvido por dois estudantes do ensino médio e foi usado como a apresentação do projecto final.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Sobre</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

       <!--  <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="assets/img/devs.jpg" class="img-fluid" alt="">
          </div> -->
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>Sobre o Angofuel</h3>
            <p>
            <strong> AngoFuel </strong>, é o sistema desenvolvido com o intuito de apresentar Postos de Abastecimento de combustíveis mais próximos da sua localização, calculando assim a melhor rota possível para o posto escolhido, e fornecer a informação do estado do mesmo Posto, se tem ou não combustível.             </p>
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>O funcionamento das Rotas</h5>
                  <p>O calculo das rotas pode ser feito com as informações da latitude e longitude...</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5>O dimensionamento do Mapa</h5>
                  <p>O mapa abrange todos os Postos em Angola.</p>
                </div>
              </li>
            
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter pt-0">
      <div class="container" data-aos="fade-up">

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

<div class="col-lg-4 col-6">
    <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="{{  $totaluser }}" data-purecounter-duration="1" class="purecounter"></span>
        <p>Usuários</p>
    </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-4 col-6">
    <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="{{  $totalbomba }}" data-purecounter-duration="1" class="purecounter"></span>
        <p>Postos</p>
    </div>
    </div><!-- End Stats Item -->

    <div class="col-lg-4 col-6">
    <div class="stats-item text-center w-100 h-100">
        <span data-purecounter-start="0" data-purecounter-end="{{  $totalempresa }}" data-purecounter-duration="1" class="purecounter"></span>
        <p>Empresas</p>
    </div>
</div><!-- End Stats Item -->

</div>

      </div>
    </section><!-- End Stats Counter Section -->

  </main><!-- End #main -->

  @endsection