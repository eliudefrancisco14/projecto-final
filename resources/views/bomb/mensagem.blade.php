@extends('layouts.adminmain')
@section('title', 'Dashboard - Mensagens')
@section('content')

<!-- Main do usuario normal e Gestor -->
  <main id="main" class="main">
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle">
      <h1>Mensagem</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Mensagem</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="card">
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="container">
              <div class="news">
                <h5 class="card-title">Mensagens &amp; Notificações <span>| hoje</span></h5>
                @foreach($mensagem as $mensagems)
                  <div class="message-item">
                    <img src="\assets\img\profile-log.jpg" alt="" class="rounded-circle">
                      <div class="post-item clearfix">
                          <h4><a href="#">{{$mensagems->nome}}</a></h4>
                        @foreach($usuarios as $usergerals)
                          @if($mensagems->user_id == $usergerals->id)
                            <h4><a href="#">{{ $usergerals->name }}</a></h4>
                            
                          @endif
                        @endforeach
                        <p>{{ $mensagems->conteudo }}</p>
                        <p>Agora</p>
                      </div>
                      
                  </div>
                  @endforeach
                  
              </div><!-- End sidebar recent posts-->

            </div>
          </div>
        
      </div><!-- End Left side columns -->

    </section>

  </main><!-- End #main -->

@endsection('content')