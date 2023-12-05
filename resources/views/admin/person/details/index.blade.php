@extends('layouts.merge.dashboard')

@section('title', 'Detalhe Pessoa Desaparecida')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')
            <div class="container justify-content-center mt-4 mb-5">
                <div class="row align-items-center mx-0">
                    <div class="col-lg-12 my-2 col-md-12 col-12">
                        <div class="card row align-items-center">
                            <div class="card-body">
                                <h3>Nome Completo: "{{ $data->fullname }}" | '{{ $data->nickname }}'</h3>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <hr>
                                            <b>Nome Do Bairro</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->neighborhood }}</p>
                                        <hr>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <hr>
                                            <b>1º Número Do Telefone</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->phoneOne }}</p>
                                        <hr>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <hr>
                                            <b>2º Número Do Telefone</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->phoneTwo }}</p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <b>Pertubação Mental?</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->mental_diase }}</p>

                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <b>Pode Falar?</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->mute_and_deaf }}</p>

                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <b>Pode Ver?</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->can_not_see }}</p>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-2">
                                        <h5 class="mb-1">
                                            <hr>
                                            <b>Nome Da Esquadra</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->watchStation }}</p>

                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <hr>
                                            <b>Número Do Telefone Da Esquadra Policial</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify">{{ $data->watchPhone }}</p>

                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de Cadastro:</b>
                                            {{ date('d-m-Y H:m', strtotime($data->created_at)) }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de Atualização:</b>
                                            {{ date('d-m-Y H:m', strtotime($data->updated_at)) }}
                                        </p>
                                    </div>
                                </div>
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
                                                    <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $data->image }}");background-position:center;background-size:cover;height:400px;width:auto;'>
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
            </div>
        </div>
    </div>
</div>
@endsection