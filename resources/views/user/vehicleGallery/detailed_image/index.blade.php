@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<!-- <div class="container mt-1">
    <div class="row">
        <div class="form-group col-md-6">
            <a href="{{ url("/storage/$data->vehicle_image") }}" class="glightbox">
                <img src="{{ url("/storage/$data->vehicle_image") }}" alt="{{ $data->vehicle_image }}" class="img-fluid" alt="" style="height:100%; width:100%;" />
            </a>
        </div>

        <div class="form-group col-md-6">
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
            <hr>
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="page-title">Imagem: <a value="{{ $data->id }}" class="Showbtn" style="cursor: pointer;">{{ $count }}</a></h2>
                </div>
                <div class="col-auto">
                    <button type="button" value="{{ $data->id }}" class="btn btn-lg btn-primary text-white Gallerybtn" data-toggle="tooltip" title='Anexar Imagem'> <span class="fe fe-plus fe-16 mr-3"></span><i class='bi bi-plus-circle'></i></button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <h4></h4>
        </div>
    </div>
</div> -->

@endsection