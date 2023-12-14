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
            <div class="container mt-1">
                <!-- About Source -->
                <div class="col-md-12 mb-3">
                    <h2 style="font-family: 'Times New Roman', Times, serif; color: #262626;">Origem</h2>
                    <h1 style="font-family: 'Times New Roman', Times, serif; color: #262626;">Surgimento - 'Portal Central Da Banda'</h1>
                </div>
                <div class="col-md-12 mb-3">
                    <p style="font-family: 'Times New Roman', Times, serif; color: #262626;">O Portal Central Da Banda, vulga-se CDB originou-se como uma mera ideia por partes dos fundadores e criadores que diante de uma conversa ou mesmo debate que nenhuma das partes aceitava que estava errado sobre a existência de algo semelhante no pais ou não. Então com base nesses questionamentos teve-se o desafio espontâneo da criação de um portal que visava ajudar a outras pessoas que se identificassem com os problemas que o Portal tenciona ajudar a resolver juntamente com a sociedade em geral, isso tudo nos príncipio do ano de 2023.</p>
                </div>

                <!-- Introduction -->
                <div class="col-md-12 mb-3">
                    <h2 style="font-family: 'Times New Roman', Times, serif; color: #262626;">Sobre</h2>
                    <h1 style="font-family: 'Times New Roman', Times, serif; color: #262626;">Sobre - 'O Portal Central Da Banda'</h1>
                </div>
                <div class="col-md-12 mb-3">
                    <p style="font-family: 'Times New Roman', Times, serif; color: #262626;">É um portal de utilidade pública da qual qualquer uma que seja a pessoa que domine ou não as TIC's normalmente consiga manejar e explorar o Portal. Vivemos em uma sociedade não só a nível de Angola mas a nível do mundo em que todos os dias nós deparamos com problemas do genero em que temos pessoas chegas a nós que dá-se participação informal do desaparecimento fisíco.</p>
                    <p>Estima-se que em média a nível de todo mundo dezenas e centenas de pessoas são dadas como desaparecidas, algumas simplesmente desaprecem por vontade espontânea.</p>
                    <p>Temos aquelas pessoas que são obrigadas a desaparecer o habitar dos seus ente-queridos, umas acabam sendo vitimas de rapto, contra-bando, ou mesmo homicídio.</p>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection