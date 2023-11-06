@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<div class="container mt-1">
    <div class="row">
        <div class="form-group col-md-6">
            <a href="{{ url("/storage/$data->image") }}" class="glightbox">
                <img src="{{ url("/storage/$data->image") }}" alt="{{ $data->image }}" class="img-fluid" alt="" style="height:100%; width:100%;" />
            </a>
        </div>

        <div class="form-group col-md-6">
            <h2>{{ $data->fullname }}</h2>
            <hr>
            <div class="row">
                <div class="form-group col-md-6">
                    <h6><b>Apelido:</b> {{ $data->nickname }}</h6>
                </div>
                <div class="form-group col-md-6">
                    <h6><b>Bairro:</b> {{ $data->neighborhood }}</h6>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>Números do Telefone:</b></p>
                </div>
                <div class="form-group col-md-6">
                    <p>{{ $data->phoneOne }} / {{ $data->phoneTwo }}</p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>Sobre de Pertubação Mental:</b></p>
                </div>
                <div class="form-group col-md-6">
                    <p>{{ $data->mental_diase }}</p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>É Mudo e Surdo:</b></p>
                </div>
                <div class="form-group col-md-6">
                    <p>{{ $data->mute_and_deaf }}</p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>Não Consegue ver:</b></p>
                </div>
                <div class="form-group col-md-6">
                    <p>{{ $data->can_not_see }}</p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>Informação da Esquadra Policial:</b></p>
                </div>
                <div class="form-group col-md-6">
                    <p>{{ $data->watchStation }} / {{ $data->watchPhone }}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <h4>({{ $count_comments }}) :: Comentários a respeito de: ' {{ $data->nickname }} '</h4>
            <hr>
        </div>
        @include('user.personComment.create.index')
        <hr>
        @foreach($comment as $comments)
        <p style="color: gray;"><b>{{ $comments->users_name->getFullName() }}</b></p>
        <p>{{ $comments->body }}</p>
        <a href=""><span><p>{{ $comments->created_at->diffForHumans() }}</p></span></a>
        @endforeach
    </div>
</div>
@endsection