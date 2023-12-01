@extends('layouts.merge.dashboard')

@section('title', 'Cadastrar Cliente')

@section('content')

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                @include('layouts._includes.dashboard.Navbar')

                <div class="container justify-content-center mt-4 mb-5">
                    @include('errors.form')
                    <div class="row align-items-center">
                        <form action="{{ route('admin.custom.store') }}" method="POST">
                            @csrf
                            @include('forms.admin._formCustom.index')
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


