<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <hr class="my-0" />
            <div class="card-body">
                <h3>Registrar Desaparecimento</h3>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <input class="form-control" id="image" name="image" type="file" value="{{ old('image') }}" />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input class="form-control" id="fullname" name="fullname" type="text" value="{{ old('fullname') }}" placeholder="Informar o nome completo..." />
                    </div>
                    <div class="col-md-12 mb-3">
                        <input class="form-control" id="nickname" name="nickname" type="text" value="{{ old('nickname') }}" placeholder="Informar o apelido..." />
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="phoneOne" name="phoneOne" type="tel" value="{{ old('phoneOne') }}" placeholder="Informar o primeiro número do telefone..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="phoneTwo" name="phoneTwo" type="tel" value="{{ old('phoneTwo') }}" placeholder="Informar o segundo número do telefone..." />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="watchStation" name="watchStation" type="tel" value="{{ old('watchStation') }}" placeholder="Informar o número ou nome da Esquadra..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="watchPhone" name="watchPhone" type="tel" value="{{ old('watchPhone') }}" placeholder="Informar o número do telefone da esquadra..." />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="neighborhood" name="neighborhood" type="text" value="{{ old('neighborhood') }}" placeholder="Informar o nome do bairro..." />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input class="form-control" id="missingdate" name="missingdate" type="date" value="{{ old('missingdate') }}" />
                        </div>
                    </div>
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="mental_diase" class="form-label" style="color: red;">Sofre da Mente?</label>
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="mental_diase" value="Sim" />
                                        <span>Sim</span>
                                    </label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>
                                        <input type="radio" name="mental_diase" value="Não" />
                                        <span>Não</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="mute_and_deaf" class="form-label" style="color: red;">Mudez e Surdez?</label>
                                <div class="form-floating">
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="mute_and_deaf" value="Sim" />
                                            <span>Sim</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>
                                        <input type="radio" name="mute_and_deaf" value="Não" />
                                        <span>Não</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="can_not_see" class="form-label" style="color: red;">Pode Ver?</label>
                                <div class="form-floating">
                                    <div class="col-md-6">
                                        <label>
                                            <input type="radio" name="can_not_see" value="Sim" />
                                            <span>Sim</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>
                                        <input type="radio" name="can_not_see" value="Não" />
                                        <span>Não</span>
                                    </label>
                                </div>
                            </div>
                        </div>
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