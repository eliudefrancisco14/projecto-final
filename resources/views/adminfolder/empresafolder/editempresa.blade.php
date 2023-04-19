@extends('layouts.adminmain')

@section('title', 'Gerenciar - Empresas')

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
      <h1>Atualizar a Empresa {{ $empresa->nome }} </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Gerenciar</li>
          <li class="breadcrumb-item active">Atualizar Empresas</li>
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
                            <h5 class="card-title">Empresas </h5>

                            <form action="/adminfolder/empresafolder/updateempresa/{{ $empresa->id }}" method="post"> 
                            @csrf
                            @method('PUT')
                            <div class="col-md-6 position-relative form-floating mb-3">
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Cargo" value="{{ $empresa->nome }}" required>
                                <label for="nome">Nome</label>
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