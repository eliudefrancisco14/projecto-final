@extends('layouts.adminmain')
@section('title', 'Dashboard - AngoFuel Administrador')
@section('content')

@if(Auth::user()->acesso_id == 1)


<!-- View dos postos do Administrador-->
<main id="main" class="main">
        
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="pb-2 text-end">
                  <a href="/bomb/pdf" class="btn btn-outline-primary b-3">
                    <i class="bi bi-file-earmark-pdf"></i>
                    <span>Imprimir Relatório</span>  
                  </a>
                </div>
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body">
                    <!-- Pesquisar por bombas cadastradas -->

                  @if(isset($search))
                  <p class="card-title h2">Procurando por: <b>{{ $search }}</b></p>
                  @else
                  <h5 class="card-title">Postos Cadastrados <span>| Atuais</span></h5>
                  @endif

                  <form action="#" method="POST">
                  <table class="table table-borderless datatable dataTable-table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Endereço do Posto de Combustível</th>
                              <th scope="col">Proprietário</th>
                              <th scope="col">Gestor</th>
                              <th scope="col">Gasolina</th>
                              <th scope="col">Gasóleo</th>
                              <th scope="col">Operação</th>
                            </tr>
                          </thead>
                            
                          @foreach($bomba as $bombas)
                          <tbody>
                              <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $bombas->nome }}</td>
                                <td style="color: #4325ff">{{ $bombas->endereco }}</td>
                                
                                <!--Nome da empresa-->
                                  @foreach($empresa as $empresas)
                                    @if($bombas->empresas_id == $empresas->id)
                                    <td>
                                      {{ $empresas->nome }}
                                    </td>
                                    @endif
                                  @endforeach

                                  <!--Nome do proprietario-->
                                  @foreach($usuarios as $usuario)
                                    @if($bombas->user_id == $usuario->id)
                                    <td>
                                      {{ $usuario->name }}
                                    </td>
                                    @endif
                                  @endforeach

                                <td class="text-center"><!--Botao para ativar gasolina-->
                                  @if($bombas->gas == 1)
                                  <span class="badge rounded-pill bg-success"><a class="text-light" href="#"><i class="bi bi-bell-fill"></i></a></span>                                
                                  @elseif($bombas->gas == 0)
                                  <span class="badge rounded-pill bg-danger"><a class="text-light" href="#"><i class="bi bi-bell-fill"></i></a></span>
                                  @endif
                                  
                                </td><!--fim do botao-->
                                <td class="text-center"><!--Botao para ativar gasoleo-->
                                  @if($bombas->gol == 1)
                                  <span class="badge rounded-pill bg-success"><a class="text-light" href="#"><i class="bi bi-bell-fill"></i></a></span>
                                  @elseif($bombas->gol == 0)
                                  <span class="badge rounded-pill bg-danger"><a class="text-light" href="#"><i class="bi bi-bell-fill"></i></a></span>
                                  @endif
                                </td><!-- fim do botao -->


                                <td class="text-center">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <form action="/bomb/{{ $bombas->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-btn btn-sm" title="Remover a Bomba"><i class="bi bi-trash"></i></button>
                                      </form>
                                    </div>
                                    
                                    
                                  </div>
                                </td>

                              </tr>
                            
                          </tbody>
                          @endforeach

                          @if(count($bomba) == 0 && $search)
                              <p class="display-6">Não existe nenhum resultado para "{{ $search }}"</p>
                            @elseif(count($bomba) == 0)
                              <p class="display-6">Não existe Bombas cadastradas.</p>
                            @endif
                        </table>

                  </form>
                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

</main><!-- End Admin View -->

@elseif(Auth::user()->acesso_id == 3)

<!-- View dos Posto do Gestor -->
<main id="main" class="main">
        
    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="msg">{{ session('msg') }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="pb-2 text-start">
                <a href="/bomb/createbomba" class="btn btn-primary b-3">
                  <i class="bi bi-plus"></i>
                  <span>Cadastrar Posto de Combustível</span>  
                </a>
              </div>
              <div class="card recent-sales overflow-auto">
                
                <div class="card-body">
                    <!-- Pesquisar por bombas cadastradas -->

                  @if(isset($search))
                  <p class="card-title h2">Procurando por: <b>{{ $search }}</b></p>
                  @else
                  <h5 class="card-title">Postos Cadastrados <span>| Atuais</span></h5>
                  @endif
                  
                  <table class="table table-borderless datatable dataTable-table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Endereço do Posto de Combustível</th>
                              <th scope="col">Gasolina</th>
                              <th scope="col">Gasóleo</th>
                              <th scope="col">Operação</th>
                            </tr>
                          </thead>
                            
                          @foreach($bomba as $bombas)
                          @if(Auth::user()->empresas_id == $bombas->empresas_id)

                          <tbody>
                              <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $bombas->nome }}</td>
                                <td style="color: #4325ff">{{ $bombas->endereco }}</td>
                                <td class="text-center"><!--Botao para ativar gasolina-->
                                  <form action="/bomb/fuel/{{ $bombas->id }}" method="GET">
                                    @csrf
                                    @if($bombas->gas == 1)
                                    <input type="hidden" name="btna" value="0">
                                    <button class="btn badge rounded-pill btn-success text-light"><i class="bi bi-bell-fill"></i></button>
                                    @elseif($bombas->gas == 0)
                                    <input type="hidden" name="btnb" value="1">
                                    <button class="btn badge rounded-pill btn-danger text-light"><i class="bi bi-bell-fill"></i></button>
                                    @endif
                                  </form>
                                </td><!--fim do botao-->
                                <td class="text-center"><!--Botao para ativar gasoleo-->
                                  <form action="/bomb/fuel/{{ $bombas->id }}" method="GET">
                                    @csrf
                                    @if($bombas->gol == 1)
                                    <input type="hidden" name="btnc" value="0">
                                    <button class="btn badge rounded-pill btn-success text-light"><i class="bi bi-bell-fill"></i></button>
                                    @elseif($bombas->gol == 0)
                                    <input type="hidden" name="btnd" value="1">
                                    <button class="btn badge rounded-pill btn-danger text-light"><i class="bi bi-bell-fill"></i></button>
                                    @endif
                                  </form>
                                </td><!-- fim do botao -->

                                <td>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <a href="/bomb/edit/{{ $bombas->id }}" class="btn btn-info btn-sm" title="Atualizar a Bomba"><i class="bi bi-upload"></i></a>
                                    </div>
                                    <div class="col-md-3">
                                      <form action="/bomb/{{ $bombas->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-btn btn-sm" title="Remover a Bomba"><i class="bi bi-trash"></i></button>
                                      </form>
                                    </div>
                                    
                                    
                                  </div>
                                </td>

                              </tr>
                            
                          </tbody>
                          @endif
                          @endforeach

                          @if(count($bomba) == 0 && $search)
                              <p class="display-6">Não existe nenhum resultado para "{{ $search }}"</p>
                            @elseif(count($bomba) == 0)
                              <p class="display-6">Não existe Postos cadastradas.</p>
                            @endif
                        </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

</main><!-- End #main -->
  
<!-- End content Gestor View-->

@endif
@endsection('content')