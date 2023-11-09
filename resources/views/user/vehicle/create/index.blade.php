@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <div class="container justify-content-center mt-4 mb-5">
                @include('errors.form')
                <form action="{{ route('user.vehicle.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('forms.vehicle._formVehicle.index')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection