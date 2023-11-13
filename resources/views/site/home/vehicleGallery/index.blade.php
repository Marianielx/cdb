@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<div class="container mt-1">
    <div class="row">
        <div class="form-group">
            <h2>Nome: {{ $data->vehicle_data->vehicle_ownername }}</h2>
            <hr>
        </div>
    </div>
    <div class="row align-items-center my-4">
        <div class="col-auto">
            <h2 class="page-title">Imagem: <a href="">{{ $count }}</h2>
        </div>
    </div>
    <hr>
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if ($slideFirst)
            <div class="carousel-item active">
                <div class="slider-image center" style='background-position:center; background-size:initial; height:400px; width:100%;no-repeat;
                        background-size:cover;
                        background-image: url("/storage/{{ $slideFirst->path }}");
                            '>
                    <div class="carousel-caption ">
                        <div class="col mt-sm-11 mt-md-11 mt-lg-0">
                            <h2>Marca: {{ $slideFirst->vehicle_data->vehicle_brand }}</h2>
                            <p>Matricula: {{ $slideFirst->vehicle_data->vehicle_card_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @isset($slideshows)
            @foreach ($slideshows as $item)
            <div class="carousel-item">
                <div class="slider-image center" style='background-position:center; background-size:initial; height:400px; width:100%;no-repeat;
                        background-size:cover;
                        background-image: url("/storage/{{ $item->path }}/$item->id");
                            '>
                </div>
                <div class="carousel-caption ">
                    <div class="col mt-sm-11 mt-md-11 mt-lg-0">
                        <h2>Chassi: {{ $item->vehicle_data->vehicle_chasis_number }}</h2>
                        <p>Motor: {{ $item->vehicle_data->vehicle_engine_number }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endisset
        </div>
    </div>
</div>
<div class="form-group">
    <h4></h4>
</div>

@endsection