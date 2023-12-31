@extends('layouts.merge.dashboard')

@section('titulo', 'Detalhes do Cliente Anúncio')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')
            <div class="container justify-content-center mt-4 mb-5">
                <div class="row align-items-center mx-0">
                    <div class="col-lg-12 my-2 col-md-12 col-12">
                        <div class="card row align-items-center">
                            <div class="card-body">
                                <h3>Cliente: "{{ $data->fullname }}"</h3>
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
                                                    <h2 class="page-title">Logotipo</h2>
                                                </div>
                                            </div>
                                            <div class="card-deck mb-4">
                                                <div class="card border-0 bg-transparent text-center">
                                                    <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $custom->image }}");background-position:center;background-size:cover;height:600px;width:auto;'>
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
                            <div class="card-body">

                                <div class="row align-items-center my-4">
                                    <div class="col">
                                        <h2 class="page-title">Imagem: {{ $count }}</h2>
                                    </div>
                                    <div class="col-auto">
                                        <a type="button" class="btn btn-lg btn-primary text-white" href="{{ url("admin/custom/banner/create/{$data->id}") }}">
                                            <span class="fe fe-plus fe-16 mr-3"></span><i class='bx bx-plus-circle'></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php $count = 1; ?>
                                    @foreach ($data->images as $item)
                                    <div class="col-md-4">
                                        <div class="card-deck mb-4">
                                            <div class="card border-0 bg-transparent">
                                                <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $item->image }}");background-position:center;background-size:cover;height:400px;width:auto;'>
                                                </div>
                                            </div>
                                            <div class="col-auto pr-0">
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url("admin/custom/banner/delete/{$item->id}") }}"><i class="bx bx-trash me-1"></i> {{ $count++ }} -
                                                            Excluir</a>
                                                            <hr>
                                                            <a class="dropdown-item" href="{{ url("admin/custom/banner/delete/{$item->id}") }}"><i class="bx bx-detail"></i> {{ $count++ }} -
                                                            Detalhe</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-6 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de cadastro:</b>
                                            {{ date('d-m-Y H:m', strtotime($custom->created_at)) }}
                                        </p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <hr>
                                        <p class="mb-1 text-dark"><b>Data de atualização:</b>
                                            {{ date('d-m-Y H:m', strtotime($custom->updated_at)) }}
                                        </p>
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