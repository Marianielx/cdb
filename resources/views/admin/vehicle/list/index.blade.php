@extends('layouts.merge.dashboard')

@section('title', 'Listar Locomotivas')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">

            <!-- Navbar -->
            @include('layouts._includes.dashboard.Navbar')
            <!-- / Navbar -->

            <div class="container justify-content-center mt-2 mb-5">
                <div class="flex-grow-1 container-p-y">
                    <!-- Bootstrap Table with Header - Dark -->
                    <div class="card">
                        <div class="table-responsive text-nowrap">
                            <div class="card-body">
                                <table class="table datatables table-hover table-bordered" id="dataTable-1">
                                    <thead class="bg-primary ">
                                        <tr class="text-center text-ligth">
                                            <th style="color: #fff;">#</th>
                                            <th style="width: 10%; color: #fff;">Matricula</th>
                                            <th>Proprietário</th>
                                            <th>Marca</thstyle=>
                                            <th style="width: 10%; color: #fff;">Data</th>
                                            <th style="width: 10%; color: #fff;">Estado</th>
                                            <th style="color: #fff;">Acções</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">

                                        @foreach ($data as $item)
                                        <tr class="text-center text-dark">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->vehicle_card_number }} </td>
                                            <td>{{ $item->vehicle_ownername }} </td>
                                            <td>{{ $item->vehicle_brand }} </td>
                                            <td>{{ date('d-m-Y', strtotime($item->vehicle_missingdate)) }} </td>
                                            <td>
                                                @if($item->vehicle_state == 'Encontrado')
                                                <p class="mb-1 text-primary">{{ $item->vehicle_state }}</p>
                                                @endif
                                                @if($item->vehicle_state == 'Procura-se')
                                                <p class="mb-1 text-danger">{{ $item->vehicle_state }}</p>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url("admin/vehicle/show/{$item->id}") }}"><i class="bx bx-detail"></i> Detalhe</a>
                                                        <hr>
                                                        <a class="dropdown-item" href="{{ url("admin/gallery/show/{$item->id}") }}"><i class='bx bxs-image-alt'></i> Galeria</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection