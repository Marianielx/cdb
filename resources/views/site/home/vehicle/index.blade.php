@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<main id="main">
    <section id="portfolio" class="portfolio sections-bg">
        <div class="container" data-aos="fade-up">

            @if(!$data->isEmpty())
            <div class="section-header">
                <h2>Procura De Meios Rolantes</h2>
                <p>A Procura de meios rolantes é uma preocupação de muitas pessoas:</p>
            </div>
            @endif

            <!-- Search -->
            <div class="mx-auto pull-right">
                <div class="">
                    <form action="{{ route('site.home.searchVehicle') }}" method="GET">
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

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 portfolio-container">
                    @if(!$data->isEmpty())
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
                            <div class="image-card">
                                <a href="{{ url("/storage/$item->vehicle_image") }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ url("/storage/$item->vehicle_image") }}" class="img-fluid"></a>
                            </div>
                            <div class="portfolio-info">
                                <hr>
                                <h4>{{ $item->vehicle_brand }}</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1 text-dark">{{ date('d-m-Y', strtotime($item->vehicle_missingdate)) }} </p>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <p class="mb-1 text-danger">{{ $item->vehicle_card_number }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <button type="button" value="{{ $item->id }}" class="btn btn-secondary showbtn btn-sm" data-toggle="tooltip" title='Visualizar Informações'><i class="bi bi-eye"></i></button>
                                            <button type="button" value="{{ $item->id }}" class="btn btn-primary descriptionbtn btn-sm" data-toggle="tooltip" title='Visualizar Apelação'><i class="bi bi-view-stacked"></i></button>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title='Visualizar Imagem'><a href="{{ route('user.gallery.details', $item->id) }}"><i class="bi bi-file-image"></a></i></></button>
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
                        <p id="ownername" class="label-control"></p>
                    </h6>
                </div>
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="ownertelephone" class="label-control"></p>
                    </h6>
                </div>
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="owneraddress" class="label-control"></p>
                    </h6>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <h6>
                            <p id="model" class="label-control"></p>
                        </h6>
                    </div>
                    <div class="col-md-6 mb-1">
                        <h6>
                            <p id="brand" class="label-control"></p>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <h6>
                            <p id="color" class="label-control"></p>
                        </h6>
                    </div>
                    <div class="col-md-8 mb-1">
                        <h6>
                            <p id="card_number" class="label-control"></p>
                        </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <h6>
                            <p id="chasis_number" class="label-control"></p>
                        </h6>
                    </div>
                    <div class="col-md-6 mb-1">
                        <h6>
                            <p id="engine_number" class="label-control"></p>
                        </h6>
                    </div>
                </div>
                <div class="col-md-12 mb-1">
                    <h6>
                        <p id="board_number" class="label-control"></p>
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
                        <p id="ownernamed" class="label-control"></p>
                    </h6>
                </div>
                <div class="col-md-12 mb-1">
                    <textarea class="form-control" id="message" style="height: 12rem" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Description Modal -->

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
                    $('#ownername').html('<p> <b>Proprietário(a):</b> ' + response.vehicle.vehicle_ownername + ' </p>');
                    $('#ownertelephone').html('<p> <b>Contacto:</b> ' + response.vehicle.vehicle_ownertelephone + ' </p>');
                    $('#owneraddress').html('<p> <b>Endereço:</b> ' + response.vehicle.vehicle_owneraddress + ' </p>');
                    $('#model').html('<p> <b>Modelo:</b> ' + response.vehicle.vehicle_model + ' </p>');
                    $('#brand').html('<p> <b>Marca:</b> ' + response.vehicle.vehicle_brand + ' </p>');
                    $('#color').html('<p> <b>Cor:</b> ' + response.vehicle.vehicle_color + ' </p>');
                    $('#card_number').html('<p> <b>Matricula Nº:</b> ' + response.vehicle.vehicle_card_number + ' </p>');
                    $('#chasis_number').html('<p> <b>Chassi Nº:</b> ' + response.vehicle.vehicle_chasis_number + ' </p>');
                    $('#engine_number').html('<p> <b>Motor Nº:</b> ' + response.vehicle.vehicle_engine_number + ' </p>');
                    $('#board_number').html('<p> <b>Placa Nº:</b> ' + response.vehicle.vehicle_board_number + ' </p>');
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
                    $('#ownernamed').html('<p> <b>Proprietário(a):</b> ' + response.vehicle.vehicle_ownername + ' </p>');
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