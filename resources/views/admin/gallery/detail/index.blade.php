@extends('layouts.merge.dashboard')

@section('title', 'Portal Central Da Banda')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')

            <div class="container justify-content-center mt-4 mb-5">
                <div class="row align-items-center mx-0">
                    <div class="col-lg-12 my-2 col-md-12 col-12">

                        <h2>{{ $data->vehicle_ownername }}</h2>
                        <hr>
                        <div class="form-group col-md-6">
                            <p><b>Marca: </b>{{ $data->vehicle_brand }} - {{ $data->vehicle_color }}</p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <h6><b>Endereço:</b> {{ $data->vehicle_owneraddress }}</h6>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <h6><b>Telefone Nº:</b> {{ $data->vehicle_ownertelephone }}</h6>
                            </div>
                            <div class="form-group col-md-6">
                                <h6><b>Matricula Nº:</b> {{ $data->vehicle_card_number }}</h6>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <p><b>Chassi Nº:</b> {{ $data->vehicle_chasis_number }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <p><b>Motor Nº:</b> {{ $data->vehicle_engine_number}}</p>
                            </div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <p><b>Placa Nº:</b> {{ $data->vehicle_board_number}}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <p><b>Tipo de Locomotiva:</b> {{ $data->vehicle_type}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2 col-md-12 col-12">
                        <div class="card row align-items-center">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-lg-10">
                                            <div class="row align-items-center my-4">
                                                <div class="col">
                                                    <h2 class="page-title">Imagem</h2>
                                                </div>
                                            </div>
                                            <div class="card-deck mb-4">
                                                <div class="card border-0 bg-transparent text-center">
                                                    <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $data->vehicle_image }}");background-position:center;background-size:cover;height:400px;width:auto;'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2 col-md-12 col-12">
                        <div class="card row align-items-center">
                            <div class="card-header">
                                <h1>Imagem Extra</h1>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($data->images as $item)
                                    <div class="col-md-4">
                                        <div class="card-deck mb-4">
                                            <div class="card border-0 bg-transparent">
                                                <a href="{{ url("/storage/$item->path") }}" class="glightbox">
                                                    <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:350px;width:auto;'>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection