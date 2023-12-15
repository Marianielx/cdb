@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<div class="row mt-1 mb-3">
    <div class="col-4">
    </div>
    <div class="col-4 d-flex justify-content-center">
    </div>
    <div class="col-4">
        <button type="button" class="btn btn-outline-warning float-right"><a href="{{ route('user.person.create') }}"><i class="bi bi-plus"></i></a></button>
    </div>
</div>

<main id="main">
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <!-- Search -->
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('user.person.search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input name="search" class="form-control form-control-sm" type="search" placeholder="Quem procuras?" required />
                            <span class="input-group-btn mr-5 mt-1">
                                <button class="btn btn-info" type="submit" title="Pesquisar Pessoa">
                                    <span class="bi bi-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Search -->

            @if(!$data->isEmpty())
            <div class="section-header">
                <h2>Pessoas</h2>
                <p>A Procura de pessoas desaparecidas é um critério de preocupação:</p>
            </div>
            @endif

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 portfolio-container">
                    @if(!$data->isEmpty())
                    @foreach ($data as $item)
                    <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                        <div class="card-header">
                            @if($item->state == 'Encontrado')
                            <h5 class="mb-1 text-primary">{{ $item->state }}</h5>
                            @endif
                            @if($item->state == 'Procura-se')
                            <h5 class="mb-1 text-danger">{{ $item->state }}</h5>
                            @endif
                        </div>
                        <div class="portfolio-wrap">
                            <div class="image-card">
                                <a href="{{ url("/storage/$item->image") }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ url("/storage/$item->image") }}" class="img-fluid"></a>
                            </div>
                            <div class="portfolio-info">
                                <h4>{{ $item->fullname }}</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="mb-1 text-dark">{{ date('d-m-Y', strtotime($item->missingdate)) }} </p>
                                    </div>
                                    <div class="col-md-2">
                                        @if($item->state == 'Encontrado')
                                        <form action="{{ route('user.person.updateOpen', $item->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="put">
                                            <button type="submit" class="btn btn-xs btn-outline-primary btn-flat show_confirm_open btn-sm" data-toggle="tooltip" title='Activar'><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                        @endif

                                        @if($item->state == 'Procura-se')
                                        <form action="{{ route('user.person.updateClose', $item->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="put">
                                            <button type="submit" class="btn btn-xs btn-outline-danger btn-flat show_confirm_close btn-sm" data-toggle="tooltip" title='Inactivar'><i class="bi bi-x-circle"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <button type="button" value="{{ $item->id }}" class="btn btn-secondary showbtn btn-sm"><i class="bi bi-eye"></i></button>
                                <button type="button" value="{{ $item->id }}" class="btn btn-warning commentbtn btn-sm"><i class="bi bi-chat"></i></button>
                                <button type="button" value="{{ $item->id }}" class="btn btn-primary descriptionbtn btn-sm"><i class="bi bi-view-stacked"></i></a></button>
                                <button type="button" class="btn btn-secondary btn-sm"><a href="{{ route('user.person.detail', $item->id) }}"><i class="bi bi-info-circle"></i></a></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="container">
                        <div class="row">
                            <div class="alert alert-warning mb-3">
                                Nenhuma Informação foi encontrada.
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Show Modal -->
<div class="modal fade" id="ShowModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-eye"></i> Detalhes da Informação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="fullname" class="label-control"></p>
                    </h6>
                </div>
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="nickname" class="label-control"></p>
                    </h6>
                </div>
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="neighborhood" class="label-control"></p>
                    </h6>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <h6>
                            <p id="phones" class="label-control"></p>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1">
                        <h6>
                            <p id="mental_diase" class="label-control"></p>
                        </h6>
                    </div>
                    <div class="col-md-12 mb-1">
                        <h6>
                            <p id="mute_and_deaf" class="label-control"></p>
                        </h6>
                    </div>
                    <div class="col-md-12 mb-1">
                        <h6>
                            <p id="can_not_see" class="label-control"></p>
                        </h6>
                    </div>
                </div>
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="watchStation" class="label-control"></p>
                    </h6>
                </div>
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="watchPhone" class="label-control"></p>
                    </h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- End Show Modal -->

<!-- Comment Modal -->
<div class="modal fade" id="CommentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-chat"></i> Comentário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @include('errors.form')
            <form action='{{ url("user/personComment/store") }}' method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="hidden" name="person_id" id="person_id" value="{{ old('person_id') }}" class="form-control" readonly>
                    </div>
                    <div class="col-md-12 mb-1">
                        <h6>
                            <p id="fullnamec" class="label-control"></p>
                        </h6>
                    </div>
                    <div class="col-md-12 mb-1">
                        <h5 class="card-title">Corpo da comentário</h5>
                        <p>Digite o comentário</p>
                        <textarea name="body" style="min-height:100px; min-width:100%" class="form-control">{{ isset($data->body) ? $data->body : old('body') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-primary">Comentar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Show Modal -->

<!-- Description Modal -->
<div class="modal fade" id="descriptionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-view-stacked"></i> Apelação Descritiva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="fullnamed" class="label-control"></p>
                    </h6>
                </div>
                <div class="col-md-12 mb-1">
                    <textarea class="form-control" id="message" style="height: 12rem" readonly></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Show Modal -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            {{ $data->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.showbtn', function() {
            var person_id = $(this).val();
            $('#ShowModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-person/show/" + person_id,
                success: function(response) {
                    $('#fullname').html('<p> <b>Nome:</b> ' + response.person.fullname + ' </p>');
                    $('#nickname').html('<p> <b>Apelido:</b> ' + response.person.nickname + ' </p>');
                    $('#phones').html('<p> <b>Contacto: </b> ' + response.person.phoneOne + ' - ' + response.person.phoneTwo + ' </p>');
                    $('#mental_diase').html('<p> <b>Pertubação Mental: </b> ' + response.person.mental_diase + ' </p>');
                    $('#mute_and_deaf').html('<p> <b>Problema da Audição: </b> ' + response.person.mute_and_deaf + ' </p>');
                    $('#can_not_see').html('<p> <b>Problema da Visão: </b> ' + response.person.can_not_see + ' </p>');
                    $('#watchStation').html('<p> <b>Descrição da Esquadra: </b> ' + response.person.watchStation + ' </p>');
                    $('#watchPhone').html('<p> <b>Contacto da Esquadra: </b> ' + response.person.watchPhone + ' </p>');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.commentbtn', function() {
            var person_id = $(this).val();
            $('#CommentModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-person/show/" + person_id,
                success: function(response) {
                    $('#person_id').val(response.person.id);
                    $('#fullnamec').html('<p> <b>Nome:</b> ' + response.person.fullname + ' </p>');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.descriptionbtn', function() {
            var person_id = $(this).val();
            $('#descriptionModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-person/show/" + person_id,
                success: function(response) {
                    $('#fullnamed').html('<p> <b>Nome:</b> ' + response.person.fullname + ' </p>');
                    $('#message').val(response.person.message);
                }
            });
        });
    });
</script>

@endsection

@section('JS')
<script>
    $('.show_confirm_close').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Deseja Inactivar Procura?`,
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

<script>
    $('.show_confirm_open').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Deseja Activar Procura?`,
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

@endsection