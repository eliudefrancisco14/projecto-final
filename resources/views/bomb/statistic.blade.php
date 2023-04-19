
@extends('layouts.layoutstatistic')
@section('title', 'Dashboard - Dados estatisticos')
@section('content')
  <!-- Header View-->
@if( Auth::user()->acesso_id == 1)

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Estatística</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Estatística</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
<div class="row">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Postos de Combustíveis</h5>

            <!-- Bar Chart -->
            <div id="barChart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#barChart"), {
                  series: [{
                    name: "Postos",
                    data: [{{ $empresasTotal }}]
                  }],
                  chart: {
                    type: 'bar',
                    height: 350
                  },
                  plotOptions: {
                    bar: {
                      borderRadius: 4,
                      horizontal: true,
                    }
                  },
                  dataLabels: {
                    enabled: false
                  },
                  xaxis: {
                    categories: [{!! $empresasLabel !!}],
                  }
                }).render();
              });
            </script>
            <!-- End Bar Chart -->

          </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Usuários</h5>

            <!-- Line Chart -->
            <div id="lineChart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#lineChart"), {
                  series: [{
                    name: "Usuários",
                    data: [{{ $userTotal }}]
                  }],
                  chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                      enabled: false
                    }
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    curve: 'straight'
                  },
                  grid: {
                    row: {
                      colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                      opacity: 0.5
                    },
                  },
                  xaxis: {
                    categories: [{{ $userAno }}],
                  }
                }).render();
              });
            </script>
            <!-- End Line Chart -->

          </div>
        </div>
    </div>
</div>
  </section>

</main><!-- End #main -->
  
@elseif(Auth::user()->acesso_id == 3)
<!--View Gestor-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Estatística</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Estatística</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Postos de Combustíveis</h5>

              <!-- Bar Chart -->
              <div id="barChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#barChart"), {
                    series: [{
                      name: "Postos",
                      data: [{{ $empresasTotal }}]
                    }],
                    chart: {
                      type: 'bar',
                      height: 350
                    },
                    plotOptions: {
                      bar: {
                        borderRadius: 4,
                        horizontal: true,
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    xaxis: {
                      categories: [{!! $empresasLabel !!}],
                    }
                  }).render();
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

@endif

@endsection('content')
