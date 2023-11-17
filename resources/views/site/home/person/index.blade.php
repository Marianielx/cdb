@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<main id="main">
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <!-- Search -->
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('site.home.search') }}" method="GET">
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
                                <p class="mb-1 text-dark">Data: {{ date('d-m-Y', strtotime($item->missingdate)) }}</p>
                                <hr>
                                <button type="button" value="{{ $item->id }}" class="btn btn-secondary showbtn btn-sm"><i class="bi bi-eye"></i></button>
                                <button type="button" value="{{ $item->id }}" class="btn btn-primary descriptionbtn btn-sm"><i class="bi bi-view-stacked"></i></a></button>
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
                <h5 class="modal-title"><i class="fa-solid fa-eye"></i> Visualizar Informação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 mb-1">
                    <label class="label-control">Nome Completo</label>
                    <input type="text" id="fullname" class="form-control" readonly>
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