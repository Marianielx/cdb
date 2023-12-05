                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <hr class="my-0" />
                            <div class="card-body">
                                <h3>{{ isset($data) ? 'Atualizar Cliente "' . $data->fullname . '"' : 'Cadastrar Cliente' }}</h3>
                                <hr>
                                <div class="row">
                                    @isset($data)
                                    <div class="col-12 col-lg-12">
                                        <div class="row align-items-center my-4">
                                            <div class="col">
                                                <h2 class="page-title">Logotipo Actual</h2>
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
                                        <input class="form-control" id="image" name="image" type="file" value="{{ old('image') }}" />
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="name" class="form-label">NIF</label>
                                        <input class="form-control" type="text" name="identitynumber" value="{{ isset($data->identitynumber) ? $data->identitynumber : old('identitynumber') }}" placeholder="Informar o Número de iInspecção Fiscal" autofocus />
                                    </div>
                                    <div class="form-group col-md-8 mb-3">
                                        <label for="name" class="form-label">Nome Completo</label>
                                        <input class="form-control" type="text" name="fullname" value="{{ isset($data->fullname) ? $data->fullname : old('fullname') }}" placeholder="Informar o nome completo" />
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="name" class="form-label">Sigla</label>
                                        <input class="form-control" type="text" name="nickname" value="{{ isset($data->nickname) ? $data->nickname : old('nickname') }}" placeholder="Informar a Sigla" />
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="name" class="form-label">Endereço</label>
                                        <input class="form-control" type="text" name="address" value="{{ isset($data->address) ? $data->address : old('address') }}" placeholder="Informar o Endereço" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button type="submit" class="btn btn-primary me-2">{{ isset($data) ? 'Atualizar' : 'Cadastrar' }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>