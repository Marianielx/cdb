                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <hr class="my-0" />
                            <div class="card-body">
                                <h3>{{ isset($data) ? 'Atualizar Usuário "' . $data->first_name . '"' : 'Cadastrar Usuário' }}</h3>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">Primeiro Nome</label>
                                        <input class="form-control" type="text" id="first_name" name="first_name" value="{{ isset($data->first_name) ? $data->first_name : old('first_name') }}" placeholder="Informar o Primeiro Nome" autofocus />
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">Último Nome</label>
                                        <input class="form-control" type="text" id="last_name" name="last_name" value="{{ isset($data->last_name) ? $data->last_name : old('last_name') }}" placeholder="Informar o Último Nome" autofocus />
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email" class="form-label">Endereço de E-mail</label>
                                        <input class="form-control" type="email" id="email" name="email" value="{{ isset($data->email) ? $data->email : old('email') }}" placeholder="Informar o endereço de E-mail" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="level" class="form-label">Nível de Acesso</label>
                                        <select name="level" id="level" class="form-control" required>
                                            @if (isset($data->level))
                                            <option value="{{ $data->level }}" class="text-primary h6" selected>
                                                {{ $data->level }}
                                            </option>
                                            @else
                                            <option disabled selected>selecione o nivel de acesso</option>
                                            @endif
                                            @if (Auth::user()->level == 'Administrator')
                                            <option value="Administrator">Administrator</option>
                                            <option value="Editor">Editor</option>
                                            @endif

                                        </select>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="password">Senha</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" class="form-control" name="password" placeholder="************" aria-describedby="password" />
                                                    <span class="input-group-text cursor-pointer"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="password_confirmation">Confirmar
                                                    Senha</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="************" aria-describedby="password_confirmation" />
                                                    <span class="input-group-text cursor-pointer"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <b class="mb-2 text-dark">Requisítos de senhas</b>
                                            <p class="small text-dark mb-2"> Para criar uma nova senha, você deve atender a
                                                todos os seguintes requisitos:
                                            </p>
                                            <ul class="small text-dark pl-4 mb-0">
                                                <li>Mínimo 8 caracteres</li>
                                                <li>Caracteres maíusculas e mínusculas</li>
                                                <li>Pelo menos um número e caracter especial</li>
                                                <li>Não pode ser igual à senha anterior</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button type="submit" class="btn btn-primary me-2">{{ isset($data) ? 'Atualizar' : 'Cadastrar' }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>