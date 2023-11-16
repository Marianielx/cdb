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
                        <div class="portfolio-wrap">
                            <div class="image-card">
                                <a href="{{ url("/storage/$item->vehicle_image") }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ url("/storage/$item->vehicle_image") }}" class="img-fluid"></a>
                            </div>
                            <div class="portfolio-info">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Destaques:</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-danger" style="text-align: right;">{{ $item->vehicle_focus }}</p>
                                    </div>
                                </div>
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
                                        <p class="mb-1 text-danger">{{ $item->vehicle_state }}</p>
                                    </div>
                                </div>
                                <hr>
                                <button type="button" value="{{ $item->id }}" class="btn btn-secondary showbtn btn-sm" data-toggle="tooltip" title='Visualizar Informações'><i class="bi bi-eye"></i></button>
                                <button type="button" value="{{ $item->id }}" class="btn btn-primary descriptionbtn btn-sm" data-toggle="tooltip" title='Visualizar Apelação'><i class="bi bi-view-stacked"></i></button>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title='Visualizar Imagem'><a href="{{ route('user.gallery.details', $item->id) }}"><i class="bi bi-file-image"></a></i></></button>
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