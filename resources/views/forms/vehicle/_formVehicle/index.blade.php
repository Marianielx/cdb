<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <hr class="my-0" />
            <div class="card-body">
                <h3>Registrar Participação</h3>
                <hr>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label>
                                Tipo de Locomotiva:
                                <span>Automóvel</span>
                                <input type="radio" name="vehicle_type" value="Automóvel" />
                                <span>&nbsp;&nbsp;Motorizada</span>
                                <input type="radio" name="vehicle_type" value="Motorizada" />
                            </label>
                        </div>
                        <div class="col-md-8">
                            <label for="label-control" style="color: red;">Qual é a Peça em destaque?:</label>
                            <label>
                                <span>Matricula</span>
                                <input type="radio" name="vehicle_focus" value="Matricula" />
                                <span>&nbsp;&nbsp;Chassi</span>
                                <input type="radio" name="vehicle_focus" value="Chassi" />
                                <span>&nbsp;&nbsp;Motor</span>
                                <input type="radio" name="vehicle_focus" value="Motor" />
                                <span>&nbsp;&nbsp;Placa</span>
                                <input type="radio" name="vehicle_focus" value="Placa" />
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input class="form-control" name="vehicle_image" type="file" value="{{ old('vehicle_image') }}" />
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input class="form-control" name="vehicle_ownername" type="text" value="{{ Auth::user()->getFullName() }}" placeholder="Informar o nome do próprietário..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" name="vehicle_ownertelephone" type="text" value="{{ old('vehicle_ownertelephone') }}" placeholder="Informar o número do telefone..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" name="vehicle_owneraddress" type="text" value="{{ old('vehicle_owneraddress') }}" placeholder="Informar a última localização..." />
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" name="vehicle_brand" type="text" value="{{ old('vehicle_brand') }}" placeholder="Informar o modelo ou a marca..." />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" name="vehicle_color" type="text" value="{{ old('vehicle_color') }}" placeholder="Informar a cor..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" name="vehicle_card_number" type="text" value="{{ old('vehicle_card_number') }}" placeholder="Informar o número da matricula..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" name="vehicle_chasis_number" type="text" value="{{ old('vehicle_chasis_number') }}" placeholder="Informar o número do chassi..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" name="vehicle_engine_number" type="text" value="{{ old('vehicle_engine_number') }}" placeholder="Informar o número do motor..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" name="vehicle_board_number" type="text" value="{{ old('vehicle_board_number') }}" placeholder="Informar o número da placa..." />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="label-control">Data do desaparecimento</label>
                            <input class="form-control" name="vehicle_missingdate" type="date" value="{{ old('vehicle_missingdate') }}" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <textarea class="form-control" name="vehicle_message" placeholder="Informar a mensagem de apelação aqui..." style="height: 12rem">{{ old('vehicle_message') }}</textarea>
                        </div>
                        <div class="mb-3 col-md-12">
                            <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>