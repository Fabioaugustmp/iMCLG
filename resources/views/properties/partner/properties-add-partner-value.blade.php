@extends('layouts.app', ['title' => __('Ativos')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Adicionar Participação Societária'),
    'class' => 'col-lg-12'
    ])
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row m-2">
                            <div class="col-6">
                                <div class="row justify-content-start">
                                    <h2><i class="fas fa-user-tag"></i> Participação dos Sócios</h2>
                                    <small data-toggle="tooltip" data-placement="top"
                                        title="Neste campo socios sao adicionados no ativo!"><i
                                            class="fas fa-info-circle"></i></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST"
                            action="{{ route('properties.insert.value.partner.post', $properties->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
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
                                                <input class="form-control" placeholder="Valor societário" type="text"
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

                                                    <!--<input type="hidden" value="{{ $partner->id }}"
                                                                        name="partner{{ count($partners) }}">
                                                                    <input class="form-control" placeholder="{{ $partner->name }}"
                                                                        type="text" name="partnerName{{ count($partners) }}"
                                                                        value="{{ $partner->name }}" readonly
                                                                        style="text-transform: uppercase">-->

                                                    <input class="form-control" type="text" value="{{ $partner->id }}"
                                                        name="partnerId[]" hidden>
                                                    <input class="form-control" type="text" value="{{ $partner->name }}"
                                                        name="partnerName[]" readonly>

                                                </div>
                                            @endforeach
                                            @if ($errors->has('partner'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('partner') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="partner">Valor Societário</label>
                                            @foreach ($partners as $partner)
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                    </div>
                                                    <!--<input class="form-control" placeholder="Valor da Aquisição"
                                                                    id="partial_value_{{ count($partners) }}" type="text"
                                                                    name="partial_value_{{ count($partners) }}"
                                                                    data-affixes-stay="true" data-prefix="R$ " data-thousands="."
                                                                    data-decimal="," aria-label="Amount">-->
                                                    <input class="form-control" type="number" name="partnerValue[]"
                                                        id="price">
                                                </div>
                                                <script>
                                                    $(function() {
                                                        $("#partial_value_{{ count($partners) }}").maskMoney();
                                                        $("#valordevenda").maskMoney();
                                                    })

                                                </script>


                                            @endforeach
                                            @if ($errors->has('cpf'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('cpf') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6">
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
                                                        </div>-->
                                </div>
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary btn-outline-primary mt-4"><i
                                            class="fas fa-user-plus" aria-hidden="true"></i>
                                        {{ __(' Inserir Participação ') }}</button>
                                    <a href="{{ route('properties') }}" class="btn btn-primary btn-outline-primary mt-4"
                                        type="button">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        <span class="btn-inner--text">Cancelar</span>
                                    </a>
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
