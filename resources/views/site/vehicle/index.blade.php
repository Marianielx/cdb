@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<div class="row mt-1 mb-3">
    <div class="col-4">
    </div>
    <div class="col-4 d-flex justify-content-center">
    </div>
    <div class="col-4">
        <button type="button" class="btn btn-outline-warning float-right"><a href="{{ route('user.vehicle.create') }}"><i class="bi bi-plus"></i></a></button>
    </div>
</div>

<main id="main">
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            <!-- Search -->
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('user.vehicle.search') }}" method="GET">
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

            <div class="section-header">
                <h2>Locomotivas</h2>
                <p>A Procura de locomotivas desaparecidos é um critério de preocupação:</p>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 portfolio-container">
                    @foreach ($data as $item)
                    <div class="col-xl-4 col-md-6 portfolio-item filter-product">
                        <div class="card-header">
                            @if($item->vehicle_state == 'Encontrado')
                            <h5 class="mb-1 text-primary">{{ $item->vehicle_state }}</h5>
                            @endif
                            @if($item->vehicle_state == 'Procura-se')
                            <h5 class="mb-1 text-danger">{{ $item->vehicle_state }}</h5>
                            @endif
                        </div>
                        <div class="portfolio-wrap">
                            <div class="vehicle-card">
                                <a href="{{ url("/storage/$item->vehicle_image") }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ url("/storage/$item->vehicle_image") }}" class="img-fluid"></a>
                            </div>
                            <div class="portfolio-info">
                                <h4>{{ $item->vehicle_brand }}</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p class="mb-1 text-dark">{{ date('d-m-Y', strtotime($item->vehicle_missingdate)) }} </p>
                                    </div>
                                    <div class="col-md-5">
                                    </div>
                                    <div class="col-md-2">
                                        @if($item->vehicle_state == 'Encontrado')
                                        <form action="{{ route('user.vehicle.updateOpen', $item->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="put">
                                            <button type="submit" class="btn btn-xs btn-outline-primary btn-flat show_confirm_open btn-sm" data-toggle="tooltip" title='Activar'><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                        @endif

                                        @if($item->vehicle_state == 'Procura-se')
                                        <form action="{{ route('user.vehicle.updateClose', $item->id) }}" method="POST">
                                            @csrf
                                            <input name="_method" type="hidden" value="put">
                                            <button type="submit" class="btn btn-xs btn-outline-danger btn-flat show_confirm_close btn-sm" data-toggle="tooltip" title='Inactivar'><i class="bi bi-x-circle"></i></button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <button type="button" value="{{ $item->id }}" class="btn btn-secondary showbtn btn-sm" data-toggle="tooltip" title='Visualizar Informações'><i class="bi bi-eye"></i></button>
                                            <button type="button" value="{{ $item->id }}" class="btn btn-warning commentbtn btn-sm" data-toggle="tooltip" title='Comentar'><i class="bi bi-chat"></i></button>
                                            <button type="button" value="{{ $item->id }}" class="btn btn-primary descriptionbtn btn-sm" data-toggle="tooltip" title='Visualizar Apelação'><i class="bi bi-view-stacked"></i></a></button>
                                            <button type="button" class="btn btn-secondary btn-sm"><a href="{{ route('user.vehicle.detail', $item->id) }}" data-toggle="tooltip" title='Informações Detalhadas'><i class="bi bi-info-circle"></i></a></button>
                                            <button type="button" class="btn btn-success btn-sm"><a href="{{ route('user.vehicleGallery.detail', $item->id) }}" data-toggle="tooltip" title='Anexar Imagem'><i class="bi bi-file-image"></i></a></button>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="vehiclefocus">
                                                <p class="text-dark">{{ $item->vehicle_focus }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                    <label class="label-control">proprietário(a)</label>
                    <h3><input type="text" id="ownername" class="form-control" readonly></h3>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Telefone Nº</label>
                    <input type="text" id="ownertelephone" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Última localização</label>
                    <input type="text" id="owneraddress" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Marca - Modelo</label>
                    <input type="text" id="brand" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Cor</label>
                    <input type="text" id="color" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Matricula Nº</label>
                    <input type="text" id="card_number" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Chassi Nº</label>
                    <input type="text" id="chasis_number" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Motor Nº</label>
                    <input type="text" id="engine_number" class="form-control" readonly>
                </div>
                <div class="col-md-12 mb-1">
                    <label class="label-control">Placa Nº</label>
                    <input type="text" id="board_number" class="form-control" readonly>
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
            <form action='{{ url("user/vehicleComment/store/{id}") }}' method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="hidden" name="vehicle_id" id="vehicle_id" value="{{ old('vehicle_id') }}" class="form-control" readonly>
                    </div>
                    <div class="col-md-12 mb-1">
                        <input type="text" id="ownernamec" style="font-size: larger;" class="form-control" readonly>
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
                    <input type="text" id="ownernamed" style="font-size: larger;" class="form-control" readonly>
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
            var vehicle_id = $(this).val();
            $('#ShowModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-vehicle/show/" + vehicle_id,
                success: function(response) {
                    $('#ownername').val(response.vehicle.vehicle_ownername);
                    $('#ownertelephone').val(response.vehicle.vehicle_ownertelephone);
                    $('#owneraddress').val(response.vehicle.vehicle_owneraddress);
                    $('#brand').val(response.vehicle.vehicle_brand);
                    $('#color').val(response.vehicle.vehicle_color);
                    $('#card_number').val(response.vehicle.vehicle_card_number);
                    $('#chasis_number').val(response.vehicle.vehicle_chasis_number);
                    $('#engine_number').val(response.vehicle.vehicle_engine_number);
                    $('#board_number').val(response.vehicle.vehicle_board_number);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.commentbtn', function() {
            var vehicle_id = $(this).val();
            $('#CommentModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-vehicle/show/" + vehicle_id,
                success: function(response) {
                    $('#vehicle_id').val(response.vehicle.id);
                    $('#ownernamec').val(response.vehicle.vehicle_ownername);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.descriptionbtn', function() {
            var vehicle_id = $(this).val();
            $('#descriptionModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-vehicle/show/" + vehicle_id,
                success: function(response) {
                    $('#ownernamed').val(response.vehicle.vehicle_ownername);
                    $('#message').val(response.vehicle.vehicle_message);
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