@extends('layouts.merge.site')
@section('title', 'Pessoas Desaparecidas')
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
            <form action="{{ route('user.person.search') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <input class="form-control form-control-sm" name="search" type="search" placeholder="Procurar Pessoa..." required />
                    </div>
                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- /Search -->

            <div class="section-header">
                <h2>Pessoas</h2>
                <p>A Procura de pessoas desaparecidas é um critério de preocupação:</p>
            </div>
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 portfolio-container">
                    @foreach ($data as $item)
                    <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                        <div class="portfolio-wrap">
                            <div style="height: 350px">
                                <a href="{{ url("/storage/$item->image") }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ url("/storage/$item->image") }}" class="img-fluid" alt="" style="height:100%; width:100%;"></a>
                            </div>
                            <div class="portfolio-info">
                                <h4>{{ $item->fullname }}</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p class="mb-1 text-dark">{{ date('d-m-Y', strtotime($item->missingdate)) }} </p>
                                    </div>
                                    <div class="col-md-5">
                                        @if($item->state == 'Encontrado')
                                        <p class="mb-1 text-primary">{{ $item->state }}</p>
                                        @endif
                                        @if($item->state == 'Procura-se')
                                        <p class="mb-1 text-danger">{{ $item->state }}</p>
                                        @endif
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
                <h5 class="modal-title"><i class="fa-solid fa-eye"></i> Visualizar Informação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-1">
                    <label class="label-control">Nome Completo</label>
                    <h3><input type="text" id="fullname" class="form-control" readonly></h3>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Apelido Ou Alcunha</label>
                    <input type="text" id="nickname" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Bairro</label>
                    <input type="text" id="neighborhood" class="form-control" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <label class="label-control">Telefone 1</label>
                        <input type="text" id="phoneOne" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label class="label-control">Telefone 2</label>
                        <input type="text" id="phoneTwo" class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <label class="label-control">Pertub. Mental?</label>
                        <input type="text" id="mental_diase" class="form-control" readonly>
                    </div>
                    <div class="col-md-4 mb-1">
                        <label class="label-control">Pode Falar?</label>
                        <input type="text" id="mute_and_deaf" class="form-control" readonly>
                    </div>
                    <div class="col-md-4 mb-1">
                        <label class="label-control">Pode Ver?</label>
                        <input type="text" id="can_not_see" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Esquadra</label>
                    <input type="text" id="watchStation" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Telefone da Esquadra</label>
                    <input type="text" id="watchPhone" class="form-control" readonly>
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
                        <input type="text" id="fullnamec" style="font-size: larger;" class="form-control" readonly>
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
                    <input type="text" id="fullnamed" style="font-size: larger;" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <textarea class="form-control" id="message" style="height: 12rem" readonly></textarea>
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
                    $('#fullname').val(response.person.fullname);
                    $('#nickname').val(response.person.nickname);
                    $('#neighborhood').val(response.person.neighborhood);
                    $('#phoneOne').val(response.person.phoneOne);
                    $('#phoneTwo').val(response.person.phoneTwo);
                    $('#mental_diase').val(response.person.mental_diase);
                    $('#mute_and_deaf').val(response.person.mute_and_deaf);
                    $('#can_not_see').val(response.person.can_not_see);
                    $('#watchStation').val(response.person.watchStation);
                    $('#watchPhone').val(response.person.watchPhone);
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
                    $('#fullnamec').val(response.person.fullname);
                    $('#nicknamec').val(response.person.nickname);
                    $('#neighborhoodc').val(response.person.neighborhood);
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
                    $('#fullnamed').val(response.person.fullname);
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