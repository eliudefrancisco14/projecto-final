@extends('layouts.usermain')

@section('title', 'AngoFuel - Combustíveis fácil na sua tela')

@section('content')

    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up">Sistema de Geolocalização de Postos de Abastecimento de Combustível</h2>
            
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

            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
            </div>

        </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">


        <div class="row gy-4">

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-map"></i></div>
            <div>
                <h4 class="title">Ver Postos</h4>
                <p class="description">Você terá a oportunidade de ver os postos mesmo sem fazer login, mas com informações simplificadas.</p>
                <a href="/mapavisita" class="readmore stretched-link"><span>Navegue</span><i class="bi bi-arrow-right"></i></a>
            </div>
            </div>
            <!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-map-pin"></i></div>
            <div>
                <h4 class="title">Visualizar Combustível</h4>
                <p class="description">Você poderá visualizar os postos com combustíveis no momento e se está próximo, e mais informações adicionais.</p>
                <a href="/dashboard" class="readmore stretched-link"><span>Navegue</span><i class="bi bi-arrow-right"></i></a>
            </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-user"></i></div>
            <div>
                <h4 class="title">Criar Conta</h4>
                <p class="description">Se você é novo, poderá criar uma conta para poder usufruir das funcionalidades do sistema.</p>
                <a href="{{ route('register') }}" class="readmore stretched-link"><span>Navegue</span><i class="bi bi-arrow-right"></i></a>
            </div>
            </div><!-- End Service Item -->

        </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
        <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Empresas Abastecedoras em Angola</h2>
        </div>

        <div class="row gy-4">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
                <div class="card-img">
                <img src="assets/img/sonangol2.jpg" alt="" class="img-fluid">
                </div>
                <h3><a href="#" class="stretched-link">Sonangol</a></h3>
                <p>Sonangol (abreviação de Sociedade Nacional de Combustíveis de Angola) é uma empresa estatal do ramo petrolífero, responsável pela administração e exploração do petróleo e gás natural em Angola</p>
            </div>
            </div><!-- End Card Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
                <div class="card-img">
                <img src="assets/img/Total.jpg" alt="" class="img-fluid">
                </div>
                <h3><a href="#" class="stretched-link">Total</a></h3>
                <p>A Total é o quarto maior grupo privado explorador de petróleo e gás natural, sendo a primeira empresa no setor na França, o seu país de origem. </p>
            </div>
            </div><!-- End Card Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
                <div class="card-img">
                <img src="assets/img/pumangol.jpg" alt="" class="img-fluid">
                </div>
                <h3><a href="#" class="stretched-link">Pumangol</a></h3>
                <p>O Grupo Pumangol é a identidade pela qual está registada a Puma Energy em Angola. O Grupo assegura o armazenamento e a distribuição de combustíveis, betumes e emulsões.</p>
            </div>
            </div><!-- End Card Item -->

        </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
        <div class="container" data-aos="zoom-out">

        <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                <h3>O que é Geolocalização</h3>
                <p> A Geolocalização é um recurso tecnológico que faz o rastreamento de um dispositivo por meio de uma conexão remota. Essa conectividade varia entre três métodos: GPS (sistema de posicionamento geográfico), GSM (sistema global para comunicações móveis) e wireless (via Wi-Fi, por exemplo).</p>
                <a class="cta-btn" href="/mapavisita">Iniciar Localização</a>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->
    <!-- 
    <section id="features" class="features">
        <div class="container">

        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

            <div class="col-md-5">
            <img src="assets/img/sonangol.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7">
            <h3>Sonangol</h3>
            <p class="fst-italic">
                Produzir para transformar!
            </p>
            
            </div>
        </div> 
        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
            <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-2.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 order-2 order-md-1">
            <h3>Corporis temporibus maiores provident</h3>
            <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
            </p>
            <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
            </p>
            </div>
        </div> 
         Features Item 
        </div>
    </section>
--> 
    </main><!-- End #main -->

@endsection