@extends('layouts.merge.dashboard')

@section('title', 'Detalhe do comentário')

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
                                <h3>Nome Completo: "{{ $data->people_data->fullname }}" | '{{ $data->people_data->nickname }}'</h3>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <h5 class="mb-1">
                                            <hr>
                                            <b>:: Comentário ::(s)</b>
                                            <hr>
                                        </h5>
                                        <p class="text-dark text-justify"></p>
                                        <hr>
                                        @foreach($comment as $comments)
                                        <p style="color: gray;"><b>{{ $comments->users_name->getFullName() }}</b></p>
                                        <p>{{ $comments->body }}</p>
                                        <a href=""><span>
                                                <p>{{ $comments->created_at->diffForHumans() }}</p>
                                            </span></a>
                                        @endforeach
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