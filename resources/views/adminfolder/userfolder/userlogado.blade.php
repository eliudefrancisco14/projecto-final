@extends('layouts.adminmain')

@section('title', 'Gerenciar - Usuarios')

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
      <h1>Usuários Cadastrados</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Usuários Cadastrados</li>
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
                            <h5 class="card-title">Usuários Cadastrados <span>| Atuais</span></h5>
                            <form action="#" method="post"> 
                                <table class="table table-hover datatable text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Data de Cadastro</th>
                                        <th scope="col">Nivel de Acesso</th> 
                                        <th scope="col">Operação</th>
                                        </tr>
                                    </thead>
                                           
                                    @foreach($usuarios as $usuario)
                                    <tbody>
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->username }}</td>
                                            <td style="color: #4325ff">{{ $usuario->email }}</td>
                                            <td> {{ $usuario->created_at->format('d/m/Y') }} </td>
                                            @if( $usuario->acesso_id == 1)
                                            <td>
                                              Administrador
                                            </td>
                                            @elseif( $usuario->acesso_id == 2)
                                            <td>
                                              Usuário normal
                                            </td>
                                            @elseif( $usuario->acesso_id == 3)
                                            <td>
                                              Gestor
                                            </td>
                                            @endif
                                            <td>
                                              <div class="row">
                                                <div class="col-md-3 text-center">
                                                  <form action="/adminfolder/userfolder/userlogado/{{ $usuario->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger delete-btn btn-sm" title="Remover o Usuário"><i class="bi bi-trash"></i></button>
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