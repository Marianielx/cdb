@extends('layouts.merge.dashboard')

@section('titulo', 'Detalhes do Cliente')

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
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>NIF: {{ $data->identitynumber }}</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Sigla: {{ $data->nickname }}</h3>
                                    </div>
                                </div>
                                <hr>
                                <h3>Nome Completo: {{ $data->fullname }}</h3>
                                <hr>
                                <h3>Endereço: {{ $data->address }}</h3>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection