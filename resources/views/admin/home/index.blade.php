@extends('layouts.merge.dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('b642c94ac46f34a64e37', {
        cluster: 'sa1'
    });
    var channel = pusher.subscribe('popup-channel');
    channel.bind('programa-de-estagio', function(data) {
        toastr.success(JSON.stringify(data.name) + ' efeitou uma candidatura');
    });
</script>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y mt-2 mb-5 ">
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="">
                                            <h4>Pessoa</h4>
                                            <hr>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="{{ route('admin.person.index') }}">Ver
                                                    mais</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Inscritos</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_people }}</h3>
                                    <hr>
                                    <span class="fw-semibold d-block mb-1">Comentários</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_person_comments }}</h3>
                                    <hr>
                                    <span class="fw-semibold d-block mb-1">Procuradas</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_people_seek }}</h3>
                                    <hr>
                                    <span class="fw-semibold d-block mb-1">Encontradas</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_people_found }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="">
                                            <h4>Locomotivas</h4>
                                            <hr>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="{{ route('admin.personComment.index') }}">Ver
                                                    mais</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Inscritos</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_vehicle }}</h3>
                                    <hr>
                                    <span class="fw-semibold d-block mb-1">Comentários</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_vehicle_comments }}</h3>
                                    <hr>
                                    <span class="fw-semibold d-block mb-1">Procurados</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_vehicle_seek }}</h3>
                                    <hr>
                                    <span class="fw-semibold d-block mb-1">Encontrados</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_vehicle_found }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="">
                                            <h4>Cliente </h4>
                                            <hr>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="{{ route('admin.custom.index') }}">Ver
                                                    mais</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Registrados</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_users }}</h3>
                                    <hr>
                                    <span class="fw-semibold d-block mb-1">Anúncios</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_custom_baner }}</h3>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="">
                                            <h4>Usuários </h4>
                                            <hr>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="{{ route('admin.user.index') }}">Ver
                                                    mais</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Registrados</span>
                                    <h3 class="card-title mb-2 text-success">{{ $count_users }}</h3>
                                </div>
                            </div>
                        </div>                        
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="h5 page-title">
                                        Registo de Actividades
                                    </h2>

                                    <div class="d-flex flex-column flex-lg-row">

                                        <div class="ml-lg-auto" id="sales-statistics-legend"></div>
                                    </div>
                                    <canvas height="400" id="myChart1" style="height:10%; width:0cm "></canvas>
                                </div>
                            </div>
                        </div>

                    </div>


                    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
                    <script>
                        var jan = JSON.parse('<?php echo $jan; ?>');

                        var fev = JSON.parse('<?php echo $fev; ?>');
                        var mar = JSON.parse('<?php echo $mar; ?>');
                        var abr = JSON.parse('<?php echo $abr; ?>');
                        var maio = JSON.parse('<?php echo $maio; ?>');
                        var jun = JSON.parse('<?php echo $jun; ?>');
                        var jul = JSON.parse('<?php echo $jul; ?>');
                        var ago = JSON.parse('<?php echo $ago; ?>');
                        var set = JSON.parse('<?php echo $set; ?>');
                        var out = JSON.parse('<?php echo $out; ?>');
                        var nov = JSON.parse('<?php echo $nov; ?>');
                        var dez = JSON.parse('<?php echo $dez; ?>');
                        const ctx = document.getElementById('myChart1').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'line',

                            data: {
                                labels: ['Janeiro', 'Fevereiro ', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Ago', 'Setembro',
                                    'Outubro', 'Novembro', 'Dezembro'
                                ],
                                datasets: [{
                                    label: 'Acessos Mensais',
                                    data: [jan, fev, mar, abr, maio, jun, jul, ago, set, out, nov, dez],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(254, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(254, 159, 64, 0.2)'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                    <!-- / Content -->
                </div>
                <div class="content-backdrop fade"></div>
            </div>

            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
@endsection