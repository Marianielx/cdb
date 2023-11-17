@extends('layouts.merge.site')

@section('title', 'Portal Central Da Banda')

@section('content')

<div class="container mt-1">
    <div class="row">
        <div class="form-group col-md-6">
            <a href="{{ url("/storage/$data->vehicle_image") }}" class="glightbox">
                <img src="{{ url("/storage/$data->vehicle_image") }}" alt="{{ $data->vehicle_image }}" class="img-fluid" alt="" style="height:100%; width:100%;" />
            </a>
        </div>

        <div class="form-group col-md-6">
            <h2>{{ $data->vehicle_ownername }}</h2>
            <hr>
            <div class="form-group col-md-6">
                <p><b>Marca: </b>{{ $data->vehicle_brand }} - {{ $data->vehicle_color }}</p>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-md-12">
                    <h6><b>Endereço:</b> {{ $data->vehicle_owneraddress }}</h6>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <h6><b>Telefone Nº:</b> {{ $data->vehicle_ownertelephone }}</h6>
                </div>
                <div class="form-group col-md-6">
                    <h6><b>Matricula Nº:</b> {{ $data->vehicle_card_number }}</h6>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>Chassi Nº:</b> {{ $data->vehicle_chasis_number }}</p>
                </div>
                <div class="form-group col-md-6">
                    <p><b>Motor Nº:</b> {{ $data->vehicle_engine_number}}</p>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <p><b>Placa Nº:</b> {{ $data->vehicle_board_number}}</p>
                </div>
                <div class="form-group col-md-6">
                    <p><b>Tipo de Locomotiva:</b> {{ $data->vehicle_type}}</p>
                </div>
            </div>
            <hr>
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="page-title">Imagem: {{ $count }}</h2>
                </div>
                <div class="col-auto">
                    <button type="button" value="{{ $data->id }}" class="btn btn-lg btn-primary text-white Gallerybtn" data-toggle="tooltip" title='Anexar Imagem'> <span class="fe fe-plus fe-16 mr-3"></span><i class='bi bi-plus-circle'></i></button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($data->images as $item)
            <div class="col-md-4">
                <div class="card-deck mb-4">
                    <div class="card border-0 bg-transparent">
                        <a href="{{ url("/storage/$item->path") }}" class="glightbox">
                            <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $item->path }}");background-position:center;background-size:cover;height:350px;width:auto;'>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="form-group">
            <h4></h4>
        </div>
    </div>
</div>

<!-- Gallery Modal -->
<div class="modal fade" id="GalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-eye"></i> Registrar Imagem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @include('errors.form')
            <form action='{{ url("missing-vehicle-Gallery/store/$data->id") }}' enctype="multipart/form-data" method="POST" class="row">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mt-1">
                        <div class="form-group">
                            <div class="custom-file">
                                <label class="form-label border-secondary" for="images">Selecione todas imagens</label>
                                <input type="file" class="form-control" name="images[]" id="images" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Gallery Modal -->

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.Gallerybtn', function() {
            var vehicle_id = $(this).val();
            $('#GalleryModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-vehicle/show/" + vehicle_id,
                success: function(response) {
                    $('#vehicle_id').val(response.vehicle.id);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.Showbtn', function() {
            var vehicle_id = $(this).val();
            $('#ShowModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/missing-vehicle/show/" + vehicle_id,
                success: function(response) {
                    //$('#vehicle_id').val(response.vehicle.id);
                }
            });
        });
    });
</script>

@endsection