<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <a type="button" class="btn btn-lg btn-primary float-end" href="{{ url("admin/custom/banner/show/{$data->id}") }}">
                    <span class="bx bx-bullseye"></span><i class='bx bx-bullseye'></i>
                </a>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <h3>Cliente Anúncio: {{ $data->fullname }} </h3>

                <hr>
                <div class="row">

                    @isset($data)
                    <div class="col-12 col-lg-12">
                        <div class="row align-items-center my-4">
                            <div class="col">
                                <h2 class="page-title">Logotipo</h2>
                            </div>
                        </div>
                        <div class="card-deck mb-4">
                            <div class="card border-0 bg-transparent">
                                <div class="card-img-top img-fluid rounded" style='background-image:url("/storage/{{ $data->image }}");background-position:center;background-size:cover;height:200px;width:250px;'>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset

                    <div class="form-group col-md-12 mb-3">
                        <label for="name" class="form-label">Logotipo</label>
                        <input class="form-control" id="image" name="image" type="file" />
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="name" class="form-label">Link</label>
                        <input class="form-control" type="text" name="link" placeholder="Informar o Link" autofocus />
                    </div>
                    <div class="form-group col-md-8 mb-3">
                        <label for="name" class="form-label">Título</label>
                        <input class="form-control" type="text" name="title" placeholder="Informar o nome completo" />
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="name" class="form-label">Alternativo (Alt)</label>
                        <input class="form-control" type="text" name="alt" placeholder="Informar o Alternativo" />
                    </div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>