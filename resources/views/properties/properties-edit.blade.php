@extends('layouts.app', ['title' => __('Ativos')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Editar Ativo'),
    'class' => 'col-lg-12'
    ])

    <!--https://stackoverflow.com/questions/51287100/laravel-ajax-search-in-bootstrap-modal-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>



    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row m-4">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="row justify-content-start">
                                    <h2><i class="far fa-edit"></i> Edicao do Ativo {{ $properties->name }}</h2>
                                    <small data-toggle="tooltip" data-placement="top"
                                        title="Neste campo um ativo pode ser atualizado! Com todas as informações!"><i
                                            class="fas fa-info-circle"></i></small>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6">
                                <div class="row justify-content-end">
                                    <a href="{{ route('properties.edit.partner', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary mt-4" type="button"><i
                                            class="fas fa-users-cog"></i> Editar Sócios
                                    </a>
                                    <a href="{{ route('properties.insert.partner', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary mt-4" type="button"><i
                                            class="fas fa-user-plus"></i> Inserir Sócios
                                    </a>
                                    <a href="{{ route('properties.insert.value.partner', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary mt-4" type="button">R<i
                                            class="fas fa-dollar-sign"></i> Participações
                                    </a>
                                    <a href="{{ route('propertie.show', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary mt-4" type="button"><i
                                            class="fas fa-chevron-circle-left"></i> Voltar
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST"
                            action="{{ route('propertie.edit.put', ['properties' => $properties->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="container">

                                <hr>

                                <div class="form-group">
                                    <label for="name">Nome do Ativo</label>
                                    <input type="text" class="form-control" id="name" placeholder="Insira o nome do ativo."
                                        name="name" value="{{ $properties->name }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <hr>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="company">
                                            Empresa</label>
                                    </div>
                                    <select class="custom-select" id="company" name="company">
                                        <option selected>{{ $properties->company }}</option>
                                        <option value="MCLG">MCLG</option>
                                        <option value="MARCELO LIMIRIO">Marcelo Limirio</option>
                                        <option value="CLEONICE LIMIRIO">Cleonice Limirio</option>
                                        <option value="NEO MARCAS">Neo Marcas</option>
                                        <option value="AGROPECUARIA">Agropecuária</option>
                                    </select>
                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="realestate">
                                            Tipo do Ativo</label>
                                    </div>
                                    <select class="custom-select" id="realestate" name="realestate">
                                        <option selected>{{ $properties->realestate }}</option>
                                        @foreach ($realestate as $estate)
                                            @if ($estate->status === 1)
                                                <option value="{{ $estate->realestate }}">{{ $estate->realestate }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('realestate'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('realestate') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="statusproperties">
                                            Status do Ativos</label>
                                    </div>
                                    <select class="custom-select" id="statusproperties" name="statusproperties">
                                        <option selected>{{ $properties->statusproperties }}</option>
                                        @foreach ($statusproperties as $status)
                                            @if ($status->status === 1)
                                                <option value="{{ $status->name }}">{{ $status->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('statusproperties'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('statusproperties') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control" maxlength="9" id="cep" placeholder="CEP"
                                                name="cep" value="{{ $properties->cep }}">
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong id="resultado"></strong>
                                            </span>
                                        </div>

                                        @if ($errors->has('cep'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('cep') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-lg-8 col-md-8 col-sm-6">
                                        <div class="form-group">
                                            <label for="logradouro">Logradouro/Rua</label>
                                            <input type="text" class="form-control" id="logradouro"
                                                placeholder="Logradouro / Rua" name="logradouro"
                                                value="{{ $properties->logradouro }}">
                                        </div>
                                        @if ($errors->has('logradouro'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('logradouro') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" class="form-control" id="bairro" placeholder="Bairro"
                                                name="bairro" value="{{ $properties->bairro }}">
                                        </div>
                                        @if ($errors->has('logradouro'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('logradouro') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="localidade">Cidade / Localidade</label>
                                            <input type="text" class="form-control" id="localidade"
                                                placeholder="Cidade / Localidade" name="cidade"
                                                value="{{ $properties->cidade }}">
                                        </div>
                                        @if ($errors->has('cidade'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('cidade') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-6">
                                        <div class="form-group">
                                            <label for="uf">Estado</label>
                                            <input type="text" class="form-control" id="uf" placeholder="Estado / UF"
                                                name="uf" value="{{ $properties->uf }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('uf'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('uf') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="localidade">Latitude</label>
                                        <input type="text" class="form-control" id="latitude" placeholder="Latitude"
                                            name="latitude" value="{{ $properties->latitude }}">
                                    </div>
                                    @if ($errors->has('latitude'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('latitude') }}</strong>
                                        </span>
                                    @endif
                                    <div class="col-md-6 mb-3">
                                        <label for="localidade">Longitude</label>
                                        <input type="text" class="form-control" id="longitude" placeholder="Longitude"
                                            name="longitude" value="{{ $properties->longitude }}">
                                    </div>
                                    @if ($errors->has('longitude'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('longitude') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="areatotal">Área Total</label>
                                        <input type="text" class="form-control" id="areatotal" name="areatotal"
                                            data-affixes-stay="true" " data-thousands=" ." data-decimal=","
                                            value="{{ $properties->areatotal }}">
                                    </div>
                                    @if ($errors->has('areatotal'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('areatotal') }}</strong>
                                        </span>
                                    @endif
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault02">Área Construída</label>
                                        <input type="text" class="form-control" id="areaconstruida" name="areaconstruida"
                                            value="{{ $properties->areaconstruida }}"
                                            data-affixes-stay="true" " data-thousands=" ." data-decimal=",">
                                    </div>
                                    @if ($errors->has('areaconstruida'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('areaconstruida') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <hr>

                                <div class="form-row">
                                    <div class="col-4">
                                        <label for="valorvenal">Valor Venal</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                            </div>
                                            <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="."
                                                data-decimal="," class="form-control" aria-label="Amount" name="valorvenal"
                                                id="valorvenal" value="{{ $properties->valorvenal }}">
                                        </div>
                                        @if ($errors->has('valorvenal'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('valorvenal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <label for="valordaaquisicao">Valor da Aquisição</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                            </div>
                                            <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="."
                                                data-decimal="," class="form-control" aria-label="Amount"
                                                name="valordaaquisicao" id="valordaaquisicao"
                                                value="{{ $properties->valordaaquisicao }}">
                                        </div>
                                        @if ($errors->has('valordaaquisicao'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('valordaaquisicao') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <label for="valordevenda">Valor de Venda</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-hand-holding-usd"></i></span>
                                            </div>
                                            <input type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="."
                                                data-decimal="," class="form-control" aria-label="Amount"
                                                name="valordevenda" id="valordevenda"
                                                value="{{ $properties->valordevenda }}">
                                        </div>
                                        @if ($errors->has('valordevenda'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('valordevenda') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="dataaquisicao">Data da Aquisição</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control" id="dataaquisicao"
                                                    name="dataaquisicao" value="{{ $properties->dataaquisicao }}"
                                                    required>
                                            </div>
                                        </div>
                                        @if ($errors->has('dataaquisicao'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('dataaquisicao') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="dataavaliacao">Data Venda/Avaliação</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control" id="dataavaliacao"
                                                    name="dataavaliacao" value="{{ $properties->dataavaliacao }}"
                                                    required>
                                            </div>
                                        </div>
                                        @if ($errors->has('dataavaliacao'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('dataavaliacao') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <hr>

                                <div class="form-row">

                                    <label for="construction" class="col-form-label">Que tipo de construção existe no
                                        ativo</label>
                                    <div class="col-sm-12">
                                        <select class="custom-select form-control" id="construction" required
                                            name="construction">
                                            <option selected>{{ $properties->construction }}</option>
                                            @foreach ($constructions as $construction)
                                                @if ($construction->status === 1)
                                                    <option value="{{ $construction->name }}">
                                                        {{ $construction->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('construction'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('construction') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <hr>

                                <div class="form-row">

                                    <!-- Modal Images-->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i
                                                            class="fas fa-image"></i>
                                                        Upload de Imagens</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <input type='file' id="imgInp" name="pictures[]" accept="image/*"
                                                        multiple />
                                                    @if ($errors->has('pictures'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('pictures') }}</strong>
                                                        </span>
                                                    @endif
                                                    <!--<img id="blah" src="#" alt="your image" />-->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                            class="far fa-times-circle"></i> Fechar</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                                            class="far fa-save"></i> Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Files -->
                                    <div class="modal fade" id="filesModal" tabindex="-1" role="dialog"
                                        aria-labelledby="filesModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="filesModalLabel"><i class="fas fa-file"></i>
                                                        Upload de Arquivos</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <input type='file' id="imgInp" name="files[]" multiple />
                                                    @if ($errors->has('files'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('files') }}</strong>
                                                        </span>
                                                    @endif
                                                    <!--<img id="blah" src="#" alt="your image" />-->

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                            class="far fa-times-circle"></i> Fechar</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                                            class="far fa-save"></i> Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modais imagens e arquivos do ativo -->
                                <div class="form-row">
                                    <!--  <div class="input-group mb-3">
                                                                                                                                                            <div class="input-group-prepend">
                                                                                                                                                                <span class="input-group-text" id="pictures">Fotos</span>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="custom-file">
                                                                                                                                                                <input type="file" class="custom-file-input" id="pictures"
                                                                                                                                                                    aria-describedby="pictures" name="pictures[]" accept="image/*" multiple>
                                                                                                                                                                <label class="custom-file-label" for="pictures">Selecionar Foto(s)</label>
                                                                                                                                                            </div>
                                                                                                                                                            @if ($errors->has('pictures'))
                                                                                                                                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                                                                                                                                    <strong>{{ $errors->first('pictures') }}</strong>
                                                                                                                                                                </span>
                                                                                                                                                            @endif
                                                                                                                                                        </div>
                                                                                                                                                        <div class="input-group mb-3">
                                                                                                                                                                                                    <div class="input-group-prepend">
                                                                                                                                                                                                        <span class="input-group-text" id="inputGroupFileAddon01">Anexos</span>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <div class="custom-file">
                                                                                                                                                                                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                                                                                                                                                                            aria-describedby="inputGroupFileAddon01">
                                                                                                                                                                                                        <label class="custom-file-label" for="inputGroupFile01">Selecionar
                                                                                                                                                                                                            Arquivo(s)</label>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>-->
                                </div>

                                <h3><i class="far fa-images"></i> Imagens</h3>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-outline-primary"
                                            data-toggle="modal" data-target="#exampleModal">
                                            <i class="fas fa-upload"></i> Upload de Imagens
                                        </button>

                                        @if ($errors->has('pictures'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('pictures') }}</strong>
                                            </span>
                                        @endif
                                        <a href="{{ route('properties.edit.images', $properties->id) }}"
                                            class="btn btn-primary btn-outline-primary">
                                            <i class="far fa-edit"></i> Editar Imagens
                                        </a>
                                    </div>
                                </div>

                                <hr>

                                <h3><i class="fas fa-stream"></i> Arquivos</h3>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary btn-outline-primary"
                                                    data-toggle="modal" data-target="#filesModal">
                                                    <i class="fas fa-file-upload"></i> Upload de Arquivos
                                                </button>

                                                @if ($errors->has('files'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('files') }}</strong>
                                                    </span>
                                                @endif
                                                <a href="{{ route('properties.edit.files', $properties->id) }}"
                                                    class="btn btn-primary btn-outline-primary">
                                                    <i class="far fa-edit"></i> Editar Arquivos
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <h3><i class="fas fa-user-shield"></i> Sócios do Ativo</h3>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome do Sócio</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Valor Investido</th>
                                                    <th scope="col">Gestor do Ativo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($partners as $partner)
                                                    <tr>
                                                        <th scope="row">{{ $partner->id }}</th>
                                                        <td style="text-transform: uppercase">{{ $partner->name }}</td>
                                                        <td>{{ $partner->email }}</td>
                                                        <td class="align-items-center">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input type="number" class="form-control"
                                                                    value="{{ $partner->partial_value }}" readonly>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($partner->manager === 1)
                                                                <i class="fas fa-user-check"></i>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="validationTextarea">Observações</label>
                                            <textarea class="form-control" id="validationTextarea"
                                                placeholder="Observações gerais do ativo"
                                                name="feedback">{{ $properties->feedback }}</textarea>

                                        </div>
                                        @if ($errors->has('feedback'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('feedback') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <hr>

                            </div>
                            <div class="container">
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary btn-outline-primary mt-4"><i
                                            class="fas fa-check" aria-hidden="true"></i>
                                        {{ __(' Atualizar Ativo') }}</button>

                                    <a href="{{ route('propertie.show', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary mt-4" type="button"><i
                                            class="fas fa-chevron-circle-left"></i> Voltar
                                    </a>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
    <script>
        const cep = document.querySelector("#cep")

        const showData = (result) => {
            for (const campo in result) {
                if (document.querySelector("#" + campo)) {
                    document.querySelector("#" + campo).value = result[campo]
                }
            }
        }

        cep.addEventListener("blur", (e) => {
            let search = cep.value.replace("-", "")
            const options = {
                method: 'GET',
                mode: 'cors', //Alterar para cors posteriorment
                cache: 'default'
            }

            const resultado = document.getElementById('resultado')

            fetch(`https://viacep.com.br/ws/${search}/json/`, options)
                .then(response => {
                    response.json().then(data => showData(data))
                })
                .catch(e => {
                    resultado.innerHTML = "CEP inválido ou inexistente!",
                        console.log('Deu Erro: ' + e.message)
                })
        })
    </script>
    <script>
        $(function() {
            $('#valorvenal').maskMoney();
            $('#valordaaquisicao').maskMoney();
            $('#valordevenda').maskMoney();
            $('#areatotal').maskMoney();
            $('#areaconstruida').maskMoney();
        })
    </script>
@endsection
