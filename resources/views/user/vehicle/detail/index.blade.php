@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<div class="container mt-1">
    <div class="row">
        <div class="form-group col-md-6">
            <a href="{{ url("/storage/$data->vehicle_image") }}" class="glightbox">
                <img src="{{ url("/storage/$data->vehicle_image") }}" alt="{{ $data->vehicle_image }}" class="img-fluid" alt="" style="height:100%; width:100%;" />
            </a>
        </div>

        <div class="form-group col-md-6">
            <h2>{{ $data->vehicle_ownername }}</h2>
            <hr>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>Modelo: </b>{{ $data->vehicle_model }}</p>
                </div>
                <div class="form-group col-md-6">
                    <p><b>Marca: </b>{{ $data->vehicle_brand }} - {{ $data->vehicle_color }}</p>
                </div>
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
        <hr>
        <div class="form-group">
            <h4>({{ $count_comments }}) :: Comentários a respeito de: ' {{ $data->vehicle_ownername }} '</h4>
            <hr>
        </div>
        @include('user.vehicleComment.create.index')
        <hr>
        @foreach($comment as $comments)
        <p style="color: gray;"><b>{{ $comments->users_name->getFullName() }}</b></p>
        <p>{{ $comments->body }}</p>
        <a href=""><span>
                <p>{{ $comments->created_at->diffForHumans() }}</p>
            </span></a>
        @endforeach
    </div>
</div>
@endsection