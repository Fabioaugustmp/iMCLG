@extends('layouts.app', ['title' => __('Ativos')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Criar Ativo'),
    'class' => 'col-lg-12'
    ])

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
                                    <h2><i class="fas fa-user-tag"></i> Cadastro de Socio</h2>
                                    <small data-toggle="tooltip" data-placement="top"
                                        title="Neste campo socios sao adicionados no ativo!"><i
                                            class="fas fa-info-circle"></i></small>
                                </div>
                            </div>
                            <!--<div class="col-6">
                                                                                        <div class="row justify-content-end">
                                                                                            <a href="{{ '/expense' }}" class="btn btn-icon btn-3 btn-primary btn-outline-primary"
                                                                                                type="button">
                                                                                                <i class="fas fa-coins"></i> Histórico de Despesas
                                                                                            </a>
                                                                                        </div>
                                                                                    </div> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('properties.add.partner.post') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">


                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <!-- your steps here -->
                                        <div class="step" data-target="#logins-part">
                                            <a type="button" class="step-trigger" role="tab"
                                                href="{{ route('properties.create') }}" aria-controls="logins-part"
                                                id="logins-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">Dados do Ativo</span>
                                            </a>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#information-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="information-part" id="information-part-trigger">
                                                <span class="bs-stepper-circle bg-primary">2</span>
                                                <span class="bs-stepper-label text-primary">Inclusão de Sócios</span>
                                            </button>
                                        </div>
                                        <!--    <div class="line"></div>
                                                                                                <div class="step" data-target="#information-part">
                                                                                                    <button type="button" class="step-trigger" role="tab"
                                                                                                        aria-controls="information-part" id="information-part-trigger">
                                                                                                        <span class="bs-stepper-circle">3</span>
                                                                                                        <span class="bs-stepper-label">Histórico de Despesas</span>
                                                                                                    </button>
                                                                                                </div> -->
                                        <div class="line"></div>
                                        <div class="step" data-target="#information-part">
                                            <button type="button" class="step-trigger" role="tab"
                                                aria-controls="information-part" id="information-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
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

                                <hr>

                                <div class="row">
                                    <div class="col-12">
                                        @if ($errors->has('properties'))
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i>
                                                    Atenção!</h4>
                                                <p>
                                                    Para realizar o cadastro de sócios, é nescessário cadastrar um ativo,
                                                    volte ao primeiro passo!
                                                </p>
                                                <p>
                                                    Ou <a href="{{ route('properties.create') }}">clique aqui.</a>
                                                </p>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <hr>
                                        @endif
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col-lg-8 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nome do Ativo</label>
                                            <div class="input-group mb-4" id="name">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input type="hidden" value="{{ $properties->id }}" name="properties">
                                                <input class="form-control" placeholder="Nome do Ativo" type="text"
                                                    name="name" value="{{ $properties->name }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="partner">Valor da Aquisição</label>
                                            <div class="input-group mb-4" id="valordaaquisicao">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Valor da Aquisição" type="text"
                                                    name="valordaaquisicao" value="{{ $properties->valordaaquisicao }}"
                                                    readonly>
                                            </div>
                                            @if ($errors->has('valordaaquisicao'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('valordaaquisicao') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <label for="partner">Lista de Socios</label>

                                <div class="row">
                                    <div class="col-lg-8 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="partner">Nome do Socio</label>
                                            @foreach ($partners as $partner)
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-user-tie"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Nome do Ativo" type="text"
                                                        name="email" value="{{ $partner->name }}" readonly
                                                        style="text-transform: uppercase">
                                                </div>
                                            @endforeach
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="partner">Valor da Aquisição</label>
                                            @foreach ($partners as $partner)
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Valor da Aquisição"
                                                        id="partial_value_{{ $partner->id }}" type="text" maxlength="11"
                                                        name="partial_value_{{ $partner->id }}" onblur="calcular();">
                                                </div>
                                            @endforeach
                                            @if ($errors->has('cpf'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('cpf') }}</strong>
                                                </span>
                                            @endif
                                            <input id="txt1" type="text" value="1" onfocus="calcular()" />
                                            <input id="txt2" type="text" value="1" onblur="calcular()" />

                                            <input id="result" type="text" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="partner">Somatória valor da aquisição</label>
                                            <div class="input-group mb-4" id="partner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Valor da Aquisição" type="numer"
                                                    maxlength="11" name="cpf" value="{{ old('cpf') }}">
                                            </div>
                                            <span id="resultado"></span>
                                            @if ($errors->has('cpf'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('cpf') }}</strong>
                                                </span>
                                            @endif
                                        </div>
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
        function calcular() {            
            var valor1 = parseInt(document.getElementById('txt1').value, 10);
            var valor2 = parseInt(document.getElementById('txt2').value, 10);
            document.getElementById('result').value = valor1 + valor2;
        }

    </script>
@endsection
