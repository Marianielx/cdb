@extends('layouts.merge.dashboard')

@section('title', 'Editar Imagem Cliente Anúncio')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')
            <div class="container justify-content-center mt-4 mb-5">
                @include('errors.form')
                <div class="row align-items-center">
                    <form class="col-lg-12 mt-2 col-md-12 col-12 mx-auto" method="POST" action="{{ route('admin.custom.banners.updateImage', $item) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <a type="button" class="btn btn-lg btn-primary float-end" href="{{ url("admin/custom/banner/show/{$data->id}") }}">
                                            <span class="bx bx-bullseye"></span><i class='bx bx-bullseye'></i>
                                        </a>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <h3>{{ isset($data) ? 'Atualizar Imagem Cliente Anúncio "' . $data->fullname . '"' : '' }}</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <div class="row align-items-center my-4">
                                                    <div class="col">
                                                        <h2 class="page-title">Logotipo</h2>
                                                    </div>
                                                </div>
                                                <div class="card-deck mb-4">
                                                    <div class="card border-0 bg-transparent">
                                                        <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $data->image }}");background-position:center;background-size:cover;height:200px;width:250px;'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12 mb-3">
                                                <label for="name" class="form-label">Logotipo</label>
                                                <input class="form-control" id="image" name="image" type="file" />
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label for="name" class="form-label">Link</label>
                                                <p>{{ $itens->link }}</p>
                                                <hr>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="name" class="form-label">Título</label>
                                                <p>{{ $itens->title }}</p>
                                                <hr>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="name" class="form-label">Alternativo (Alt)</label>
                                                <p>{{ $itens->alt }}</p>
                                                <hr>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <button type="submit" class="btn btn-primary me-2">{{ isset($data) ? 'Atualizar' : '' }}</button>
                                            </div>
                                            <div class="col-lg-12 mt-2 col-md-12 col-12">
                                                <div class="card row align-items-center">
                                                    <div class="card-body">
                                                        <div class="row justify-content-center">
                                                            <div class="col-12 col-lg-10">
                                                                <div class="row align-items-center my-4">
                                                                    <div class="col">
                                                                        <h2 class="page-title">Logotipo do Anúncio</h2>
                                                                    </div>
                                                                </div>
                                                                <div class="card-deck mb-4">
                                                                    <div class="card border-0 bg-transparent text-center">
                                                                        <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $itens->path }}");background-position:center;background-size:cover;height:600px;width:auto;'>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection