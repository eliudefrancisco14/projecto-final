@extends('layouts.adminmain')

@section('title', 'Gerenciar - Empresas')

@section('content')


<main id="main" class="main">
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle">
      <h1>Empresas Cadastradas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Gerenciar</li>
          <li class="breadcrumb-item active">Empresas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
            <!-- Left side columns -->
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                            <div class="pb-2 text-start">
                              <a href="/adminfolder/empresafolder/createempresa" class="btn btn-primary b-3">
                                <i class="bi bi-plus"></i>
                                <span>Cadastrar empresas</span>  
                              </a>
                            </div>
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                            <h5 class="card-title">Empresas Cadastradas <span>| Atuais</span></h5>
                            
                            <form action="#" method="post"> 
                                <table class="table table-hover datatable text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Data de Cadastro</th>
                                        <th scope="col">Operações</th> 
                                        </tr>
                                    </thead>
                                           
                                    @foreach($empresa as $empresas)
                                    <tbody>
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>{{ $empresas->nome }}</td>
                                            <td> {{ $empresas->created_at->format('d/m/Y') }} </td>
                                            <td>
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <a href="/adminfolder/empresafolder/editempresa/{{ $empresas->id }}" class="btn btn-info btn-sm" title="Atualizar a Empresa"><i class="bi bi-upload"></i></a>
                                                </div>
                                                <div class="col-md-3">
                                                  <form action="/adminfolder/empresafolder/empresas/{{ $empresas->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger delete-btn btn-sm" title="Remover a Empresa"><i class="bi bi-trash"></i></button>
                                                  </form>
                                                </div>
                                              </div>
                                            </td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                    @endforeach
                                    
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</main>

@endsection('content')