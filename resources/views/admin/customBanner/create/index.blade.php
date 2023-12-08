@extends('layouts.merge.dashboard')

@section('title', 'Cadastrar Cliente Anúncio')

@section('content')

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            @include('layouts._includes.dashboard.Navbar')
            <div class="container justify-content-center mt-4 mb-5">
                @include('errors.form')
                <div class="row align-items-center">
                    <form action='{{ url("admin/custom/banner/store/$data->id") }}' method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('forms.admin._formcustomBanner.index')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection