@extends('layouts.adminmain')

@section('title', 'Gerenciar - Gestor')

@section('content')

<!-- Principal -->
<main id="main" class="main">
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle">
      <h1>Atualizar o Gestor {{ $gestor->nome }} </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Gerenciar</li>
          <li class="breadcrumb-item active">Gestor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
            <!-- Left side columns -->
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                            <h5 class="card-title">Gestor </h5>

                            <form action="/adminfolder/gestorfolder/updategestor/{{ $gestor->id }}" method="post"> 
                              @csrf
                              @method('PUT')
                              <div class="row">
                                <div class="col-md-6 position-relative form-floating mb-3">
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Gestor" value="{{ $gestor->name }}" required>
                                    <label for="nome">Nome</label>
                                </div>
                                    <div class="col-md-6 form-floating mb-3">
                                      <select name="select" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                                        <option selected="" class="text-muted">--Escolha a Empresa do Gestor</option>
                                        @foreach($empresa as $empresas)
                                        <option value="{{ $empresas->id }}">{{ $empresas->nome }}</option>
                                        @endforeach

                                      </select>
                                      <label for="floatingSelect">Menu de Empresas</label>
                                    </div>
                                    <div class="col-md-6 position-relative form-floating mb-3">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password do Gestor" min="8" minlenght="8" maxlength="255" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-md-6 position-relative mb-3">
                                      <ul>
                                        <li>
                                          <span>A palavra-passe deve serguir os seguintes critérios</span>
                                        </li>
                                        <li>
                                          <i class="bi bi-exclamation-octagon me-1 text-warning"></i>
                                          <span>Deverá conter no mínimo 8 caractéres</span>
                                        </li>
                                        <li>
                                          <i class="bi bi-exclamation-octagon me-1 text-warning"></i>
                                          <span>Deverá conter caracteres especiais</span>
                                        </li>
                                        <li>
                                          <i class="bi bi-exclamation-octagon me-1 text-warning"></i>
                                          <span>Deverá conter valores numéricos</span>
                                        </li>
                                      </ul>
                                </div>
                              </div>
                              <div class="col-md-6 text-end">
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                              </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</main>


@endsection('content')