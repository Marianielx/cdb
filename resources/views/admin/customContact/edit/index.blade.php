@extends('layouts.merge.dashboard')

@section('title', 'Editar Cliente')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('layouts._includes.dashboard.Navbar')
            <!-- / Navbar -->
            <div class="container justify-content-center mt-4 mb-5">
                @include('errors.form')
                <div class="row align-items-center">
                    <form class="col-lg-12 mt-2 col-md-12 col-12 mx-auto" method="POST" action="{{ route('admin.custom.update', $data->id) }}">
                        @csrf
                        @method('PUT')
                        @include('forms.admin._formCustom.index')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection