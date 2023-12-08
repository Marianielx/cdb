@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<main id="main">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero" style="background-color: #fff; background-position: center;  background-size: cover; background-repeat: no-repeat;">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if ($slideFirst)
                <a href="//{{$slideFirst->link}}" target="_blank">
                    <div class="carousel-item active">
                        <div class="slider-image center" style='background-position:center; background-size:initial; height:800px; width:100%;no-repeat; background-size:cover; background-image: url("/storage/{{ $slideFirst->path }}");'>
                            <div class="carousel-caption ">
                                <div class="col mt-sm-11 mt-md-11 mt-lg-0">
                                    <h2>{{ $slideFirst->title }}</h2>
                                    <p>{{ $slideFirst->alt }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                @isset($slideshows)
                @foreach ($slideshows as $item)
                <a href="//{{$item->link}}" target="_blank">
                    <div class="carousel-item">
                        <div class="slider-image center" style='background-position:center; background-size:initial; height:800px; width:100%;no-repeat; background-size:cover; background-image: url("/storage/{{ $item->path }}");'>
                        </div>
                        <div class="carousel-caption ">
                            <div class="col mt-sm-11 mt-md-11 mt-lg-0">
                                <h2>{{ $item->title }}</h2>
                                <p>{{ $item->alt }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
                @endisset
            </div>
            <div class="icon-boxes position-relative">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">
                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bi-wifi"></i></div>
                                <h4 class="title"><a href="#stats-counter" class="stretched-link">Angola Online</a></h4>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bi bi-gear"></i></div>
                                <h4 class="title"><a href="#blog" class="stretched-link">Serviços</a></h4>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bi-clipboard-check"></i></div>
                                <h4 class="title"><a href="#homologation" class="stretched-link">Homologação</a></h4>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <div class="icon"><i class="bi-person-circle"></i></div>
                                <h4 class="title"><a href="#clients" class="stretched-link">Parceiros</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection