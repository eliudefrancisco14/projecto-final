@extends('layouts.adminmain')

@section('title', 'Gerenciar - Gestor')

@section('content')

<main id="main" class="main">
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle">
      <h1>Gestores Cadastrados</h1>
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
                            <div class="pb-2 text-start">
                              <a href="/adminfolder/gestorfolder/creategestor" class="btn btn-primary b-3">
                                <i class="bi bi-plus"></i>
                                <span>Cadastrar gestores</span>  
                              </a>
                            </div>
                        <div class="card recent-sales overflow-auto">
                            
                            <div class="card-body">
                            <h5 class="card-title">Gestores Cadastrados <span>| Atuais</span></h5>
                            
                            <form action="#" method="post"> 
                              <table class="table table-hover datatable text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Data de Criação</th>
                                        <th scope="col">Empresas</th> 
                                        <th scope="col">Operação</th>
                                        </tr>
                                    </thead>
                                           
                                    @foreach($usuarios as $usuario)
                                    @if($usuario->acesso_id == 3)
                                    <tbody>
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->username }}</td>
                                            <td style="color: #4325ff">{{ $usuario->email }}</td>
                                            @if(isset($usuario->created_at))
                                            <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                                            @else
                                            <td> - </td>
                                            @endif
                                            @foreach($empresa as $empresas)
                                              @if($usuario->empresas_id == $empresas->id)
                                              <td>
                                                {{ $empresas->nome }}
                                              </td>
                                              @endif
                                            @endforeach
                                            <td>
                                              <div class="row">
                                                  <div class="col-md-3">
                                                    <a href="/adminfolder/gestorfolder/editgestor/{{ $usuario->id }}" class="btn btn-info btn-sm" title="Atualizar a Gestor"><i class="bi bi-upload"></i></a>
                                                  </div>
                                                  <div class="col-md-3">  
                                                    <form action="/adminfolder/gestorfolder/gestor/{{ $usuario->id }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button class="btn btn-danger delete-btn btn-sm" title="Remover o Usuário"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                  </div>
                                              </div>
                                            </td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                    @endif
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