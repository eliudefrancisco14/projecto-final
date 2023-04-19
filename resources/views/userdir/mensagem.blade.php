@extends('layouts.adminmain')
@section('title', 'Dashboard - AngoFuel Administrador')
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
              <form action="/userdir/mensagem" class="row g-3 needs-validation" method="POST" novalidate>
                @csrf
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Informe aqui: </label>
                        <div class="col-sm-10">
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

@endsection('content')