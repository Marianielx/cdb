@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda - Entre ou Cadastre-se')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                <div class="container justify-content-center mt-4 mb-5">
                    @include('errors.form')
                    <div class="row align-items-center">
                        <form action="{{ route('visitor.user.store') }}" method="POST">
                            @csrf
                            @include('forms.visitor._formUser.index')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

