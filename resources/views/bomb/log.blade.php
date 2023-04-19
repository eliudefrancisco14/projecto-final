@extends('layouts.adminmain')

@section('title', 'Dashboard - Log de Actividades')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Log de atividades</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Log de Atividades</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="col-lg-12">
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-download"></i>Baixar PDF</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Sales <span>| Today</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Log</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><a href="#">001</a></th>
                    <td><span class="badge bg-warning">Warning</span></td>
                    <td><a href="#" class="text-primary">O usuário "Alfredo Sonangol" cadastrou um posto</a></td>
                    <td>27/02/2023</td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#">002</a></th>
                    <td><span class="badge bg-warning">Warning</span></td>
                    <td><a href="#" class="text-primary">O Posto "P.A. SAO PAULO Sonangol" atualizou o combustível</a></td>
                    <td>24/02/2023</td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#">003</a></th>
                    <td><span class="badge bg-danger">Error</span></td>
                    <td><a href="#" class="text-primary">O usuário "George Total" inseriu uma senha errada</a></td>
                    <td>21/02/2023</td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales --> 
      
    </div>
  </section>



</main><!-- End #main -->

@endsection('content')