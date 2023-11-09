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
                                <span>Automóvel</span>
                                <input type="radio" name="vehicle_type" value="Automóvel" />
                                <span>&nbsp;&nbsp;Motorizada</span>
                                <input type="radio" name="vehicle_type" value="Motorizada" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <input class="form-control" id="image" name="image" type="file" value="{{ old('image') }}" />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input class="form-control" id="ownername" name="vehicle_ownername" type="text" value="{{ Auth::user()->getFullName() }}" placeholder="Informar o nome do próprietário..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" id="ownertelephone" name="vehicle_ownertelephone" type="text" value="{{ old('vehicle_ownertelephone') }}" placeholder="Informar o número do telefone..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" id="owneraddress" name="vehicle_owneraddress" type="text" value="{{ old('vehicle_owneraddress') }}" placeholder="Informar a última localização..." />
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input class="form-control" id="brand" name="vehicle_brand" type="text" value="{{ old('vehicle_brand') }}" placeholder="Informar o modelo ou a marca..." />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" id="color" name="vehicle_color" type="text" value="{{ old('vehicle_color') }}" placeholder="Informar a cor..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" id="card_number" name="vehicle_card_number" type="text" value="{{ old('vehicle_card_number') }}" placeholder="Informar o número da matricula..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" id="chasis_number" name="vehicle_chasis_number" type="text" value="{{ old('vehicle_chasis_number') }}" placeholder="Informar o número do chassi..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" id="engine_number" name="vehicle_engine_number" type="text" value="{{ old('vehicle_engine_number') }}" placeholder="Informar o número do motor..." />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" id="board_number" name="vehicle_board_number" type="text" value="{{ old('vehicle_board_number') }}" placeholder="Informar o número da placa..." />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="label-control">Data do desaparecimento</label>
                        <input class="form-control" id="missingdate" name="missingdate" type="date" value="{{ old('missingdate') }}" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <textarea class="form-control" id="message" name="message" placeholder="Informar a mensagem de apelação aqui..." style="height: 12rem">{{ old('message') }}</textarea>
                    </div>
                    <div class="mb-3 col-md-12">
                        <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>