@extends('layouts.app', ['title' => __('Ativos')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Criar Ativo'),
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



    <style>
        /*!
                                         * bsStepper v{version} (https://github.com/Johann-S/bs-stepper)
                                         * Copyright 2018 - {year} Johann-S <johann.servoire@gmail.com>
                                         * Licensed under MIT (https://github.com/Johann-S/bs-stepper/blob/master/LICENSE)
                                         */

        .bs-stepper .step-trigger {
            display: inline-flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.5;
            color: #6c757d;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: none;
            border-radius: .25rem;
            transition: background-color .15s ease-out, color .15s ease-out;
        }

        .bs-stepper .step-trigger:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .bs-stepper .step-trigger:disabled,
        .bs-stepper .step-trigger.disabled {
            pointer-events: none;
            opacity: .65;
        }

        .bs-stepper .step-trigger:focus {
            color: #007bff;
            outline: none;
        }

        .bs-stepper .step-trigger:hover {
            text-decoration: none;
            background-color: rgba(0, 0, 0, .06);
        }

        @media (max-width: 520px) {
            .bs-stepper .step-trigger {
                flex-direction: column;
                padding: 10px;
            }
        }

        .bs-stepper-label {
            display: inline-block;
            margin: .25rem;
        }

        .bs-stepper-header {
            display: flex;
            align-items: center;
        }

        @media (max-width: 520px) {
            .bs-stepper-header {
                margin: 0 -10px;
                text-align: center;
            }
        }

        .bs-stepper-line,
        .bs-stepper .line {
            flex: 1 0 32px;
            min-width: 1px;
            min-height: 1px;
            margin: auto;
            background-color: rgba(0, 0, 0, .12);
        }

        @media (max-width: 400px) {

            .bs-stepper-line,
            .bs-stepper .line {
                flex-basis: 20px;
            }
        }

        .bs-stepper-circle {
            display: inline-flex;
            align-content: center;
            justify-content: center;
            width: 2em;
            height: 2em;
            padding: .5em 0;
            margin: .25rem;
            line-height: 1em;
            color: #fff;
            background-color: #6c757d;
            border-radius: 1em;
        }

        .active .bs-stepper-circle {
            background-color: #007bff;
        }

        .bs-stepper-content {
            padding: 0 20px 20px;
        }

        @media (max-width: 520px) {
            .bs-stepper-content {
                padding: 0;
            }
        }

        .bs-stepper.vertical {
            display: flex;
        }

        .bs-stepper.vertical .bs-stepper-header {
            flex-direction: column;
            align-items: stretch;
            margin: 0;
        }

        .bs-stepper.vertical .bs-stepper-pane,
        .bs-stepper.vertical .content {
            display: block;
        }

        .bs-stepper.vertical .bs-stepper-pane:not(.fade),
        .bs-stepper.vertical .content:not(.fade) {
            display: block;
            visibility: hidden;
        }

        .bs-stepper-pane:not(.fade),
        .bs-stepper .content:not(.fade) {
            display: none;
        }

        .bs-stepper .content.fade,
        .bs-stepper-pane.fade {
            visibility: hidden;
            transition-duration: .3s;
            transition-property: opacity;
        }

        .bs-stepper-pane.fade.active,
        .bs-stepper .content.fade.active {
            visibility: visible;
            opacity: 1;
        }

        .bs-stepper-pane.active:not(.fade),
        .bs-stepper .content.active:not(.fade) {
            display: block;
            visibility: visible;
        }

        .bs-stepper-pane.dstepper-block,
        .bs-stepper .content.dstepper-block {
            display: block;
        }

        .bs-stepper:not(.vertical) .bs-stepper-pane.dstepper-none,
        .bs-stepper:not(.vertical) .content.dstepper-none {
            display: none;
        }

        .vertical .bs-stepper-pane.fade.dstepper-none,
        .vertical .content.fade.dstepper-none {
            visibility: hidden;
        }

    </style>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row m-2">
                            <div class="col-6">
                                <div class="row justify-content-start">
                                    <h2><i class="far fa-edit"></i> Edicao do Ativo {{$properties->name}}</h2>
                                    <small data-toggle="tooltip" data-placement="top"
                                        title="Neste campo um ativo pode ser atualizado! Com todas as informações!"><i
                                            class="fas fa-info-circle"></i></small>

                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('properties.create.post') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <!-- your steps here -->
                                            <div class="step" data-target="#logins-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="logins-part" id="logins-part-trigger">
                                                    <span class="bs-stepper-circle bg-primary">1</span>
                                                    <span class="bs-stepper-label text-primary">Dados do Ativo</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <a type="button" class="step-trigger" role="tab"
                                                    href="{{ route('properties.show.partner') }}"
                                                    aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Inclusão de Sócios</span>
                                                </a>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">Histórico de Despesas</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>
                                            <div class="step" data-target="#information-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="information-part" id="information-part-trigger">
                                                    <span class="bs-stepper-circle">4</span>
                                                    <span class="bs-stepper-label">Salvar Ativo</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="bs-stepper-content">
                                            <!-- your steps content here -->
                                            <div id="logins-part" class="content" role="tabpanel"
                                                aria-labelledby="logins-part-trigger"></div>
                                            <div id="information-part" class="content" role="tabpanel"
                                                aria-labelledby="information-part-trigger"></div>
                                        </div>
                                    </div>
                                </div>

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
                                        <option selected>{{$properties->company}}</option>
                                        <option value="MCLG">MCLG</option>
                                        <option value="MARCELO LIMIRIO">Marcelo Limirio</option>
                                        <option value="CLEONICE LIMIRIO">Cleonice Limirio</option>
                                        <option value="NEO AVIACAO">Neo Aviação</option>
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
                                        <option selected>{{$properties->$realestate}}</option>
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
                                        <option selected>{{$properties->statusproperties}}</option>
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
                                        <input type="text" class="form-control" id="latitude"
                                            placeholder="Latitude" name="latitude"
                                            value="{{ $properties->latitude }}">
                                    </div>
                                    @if ($errors->has('latitude'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                    @endif
                                    <div class="col-md-6 mb-3">
                                        <label for="localidade">Longitude</label>
                                        <input type="text" class="form-control" id="longitude"
                                            placeholder="Longitude" name="longitude"
                                            value="{{ $properties->longitude }}">
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
                                        <input type="text" class="form-control" id="areatotal" name="areatotal" data-affixes-stay="true" " data-thousands="."
                                        data-decimal=","
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
                                            value="{{ $properties->areaconstruida }}" data-affixes-stay="true" " data-thousands="."
                                            data-decimal=",">
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
                                                name="valordevenda" id="valordevenda" value="{{ $properties->valordevenda }}">
                                        </div>
                                        @if ($errors->has('valordevenda'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('valordevenda') }}</strong>
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
                                            <option value="{{$properties->constructions}}" selected>{{$properties->constructions}}</option>
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
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-outline-primary" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fas fa-upload"></i> Upload de Imagens
                                    </button>

                                    @if ($errors->has('pictures'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('pictures') }}</strong>
                                        </span>
                                    @endif

                                    <button type="button" class="btn btn-primary btn-outline-primary" data-toggle="modal"
                                        data-target="#filesModal">
                                        <i class="fas fa-folder-plus"></i> Upload de Arquivos
                                    </button>

                                    @if ($errors->has('files'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('files') }}</strong>
                                        </span>
                                    @endif

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

                                <hr>

                                <h3><i class="far fa-images"></i> Imagens</h3>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome do Arquivo</th>
                                                    <th scope="col">Visualizar</th>
                                                    <th scope="col">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties->images as $image)
                                                    <tr>
                                                        <th scope="row">{{ $image->id }}</th>
                                                        <td>{{ $image->id }} - Arquivo -
                                                            {{ $properties->realestate }}
                                                        </td>
                                                        <td><a href="" type="button" data-toggle="modal"
                                                                data-target="#arquivoModal"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a></td>
                                                        <td><a href="{{ env('APP_URL') }}/storage/{{ $image->path }}"
                                                                target="_blank"><i class="fa fa-download"
                                                                    aria-hidden="true"></i></a></td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="arquivoModal" data-backdrop="static"
                                                        data-keyboard="false" tabindex="-1"
                                                        aria-labelledby="arquivoModalLabel" aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="arquivoModalLabel">
                                                                        {{ $image->id }} - Imagem -
                                                                        {{ $properties->realestate }}</h3>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container">

                                                                        <object class="PDFdoc" width="100%" height="500px"
                                                                            type="application/pdf"
                                                                            data="{{ env('APP_URL') }}/storage/{{ $image->path }}"></object>


                                                                    </div>
                                                                    <div class=" modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-outline-primary"
                                                                            data-dismiss="modal"><i
                                                                                class="far fa-times-circle"></i> Fechar</button>
                                                                        <a type="button" class="btn btn-primary btn-outline-primary"
                                                                            href="{{ env('APP_URL') }}/storage/{{ $image->path }}"
                                                                            target="_blank"><i class="fas fa-times"></i>
                                                                            Excluir Imagem</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <hr>

                                <h3><i class="fas fa-stream"></i> Arquivos</h3>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome do Arquivo</th>
                                                    <th scope="col">Visualizar</th>
                                                    <th scope="col">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties->files as $file)
                                                    <tr>
                                                        <th scope="row">{{ $file->id }}</th>
                                                        <td>{{ $file->id }} - Arquivo -
                                                            {{ $properties->realestate }}
                                                        </td>
                                                        <td><a href="" type="button" data-toggle="modal"
                                                                data-target="#arquivoFiles{{ $file->id }}"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a></td>
                                                        <td><a href="{{ env('APP_URL') }}/storage/{{ $file->path }}"
                                                                target="_blank"><i class="fa fa-download"
                                                                    aria-hidden="true"></i></a></td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="arquivoFiles{{ $file->id }}" data-backdrop="static"
                                                        data-keyboard="false" tabindex="-1"
                                                        aria-labelledby="arquivoFiles{{ $file->id }}Label" aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="arquivoFiles{{ $file->id }}Label">
                                                                        {{ $file->id }} - Arquivo -
                                                                        {{ $properties->realestate }}</h3>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container">

                                                                        <object class="PDFdoc" width="100%" height="500px"
                                                                            type="application/pdf"
                                                                            data="{{ env('APP_URL') }}/storage/{{ $file->path }}"></object>


                                                                    </div>
                                                                    <div class=" modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal"><i
                                                                                class="fas fa-times"></i> Fechar</button>
                                                                        <a type="button" class="btn btn-primary"
                                                                            href="{{ env('APP_URL') }}/storage/{{ $file->path }}"
                                                                            target="_blank"><i class="fas fa-download"></i>
                                                                            Download</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                name="feedback">{{ old('feedback') }}</textarea>

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
                                        {{ __(' Gravar Ativo') }}</button>
                                    <a href="{{ route('properties') }}" class="btn btn-primary btn-outline-primary mt-4"
                                        type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        <span class="btn-inner--text">Cancelar</span>
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
