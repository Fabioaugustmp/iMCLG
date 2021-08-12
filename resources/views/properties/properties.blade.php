@extends('layouts.app', ['title' => __('Ativos')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __(''),
    'class' => 'col-lg-12'
    ])

    <style>
        /*----  Main Style  ----*/
        #cards_landscape_wrap-2 {
            text-align: center;
            background: #F7F7F7;
        }

        #cards_landscape_wrap-2 .container {
            padding-bottom: 25px;
        }

        #cards_landscape_wrap-2 a {
            text-decoration: none;
            outline: none;
        }

        #cards_landscape_wrap-2 .card-flyer {
            border-radius: .25rem;
            border-left-width: .25rem;
            border-left-color: #130d8d;
        }

        #cards_landscape_wrap-2 .card-flyer .image-box {
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.50);
            border-radius: 5px;
        }

        #cards_landscape_wrap-2 .card-flyer .image-box img {
            -webkit-transition: all .9s ease;
            -moz-transition: all .9s ease;
            -o-transition: all .9s ease;
            -ms-transition: all .9s ease;
            width: 100%;
            height: 200px;
        }

        #cards_landscape_wrap-2 .card-flyer:hover .image-box img {
            opacity: 0.7;
            -webkit-transform: scale(1.15);
            -moz-transform: scale(1.15);
            -ms-transform: scale(1.15);
            -o-transform: scale(1.15);
            transform: scale(1.15);
        }

        #cards_landscape_wrap-2 .card-flyer .text-box {
            text-align: left;
        }

        #cards_landscape_wrap-2 .card-flyer .text-box .text-container {
            padding: 30px 18px;
        }

        #cards_landscape_wrap-2 .card-flyer {
            background: #FFFFFF;
            margin-top: 25px;
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.40);
        }

        #cards_landscape_wrap-2 .card-flyer:hover {
            background: #fff;
            box-shadow: 0px 15px 26px rgba(0, 0, 0, 0.50);
            -webkit-transition: all 0.2s ease-in;
            -moz-transition: all 0.2s ease-in;
            -ms-transition: all 0.2s ease-in;
            -o-transition: all 0.2s ease-in;
            transition: all 0.2s ease-in;
            margin-top: 75px;
            margin-bottom: 50px;
        }

        #cards_landscape_wrap-2 .card-flyer .text-box p {
            margin-top: 10px;
            margin-bottom: 0px;
            padding-bottom: 0px;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 1px;
            color: #000000;
        }

        #cards_landscape_wrap-2 .card-flyer .text-box h6 {
            margin-top: 0px;
            margin-bottom: 4px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            font-family: 'Roboto Black', sans-serif;
            letter-spacing: 1px;
            color: #1e1a55;
        }
    </style>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">

                        <div class="row mx-2 px-2">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="row justify-content-start">
                                    <div class="row">
                                        <div class="container">
                                            <p>
                                                <button class="btn btn-primary btn-outline-primary" type="button"
                                                    data-toggle="collapse" data-target="#pesquisaDetalhada"
                                                    aria-expanded="false" aria-controls="pesquisaDetalhada">
                                                    <i class="fas fa-filter"></i> Filtrar
                                                </button>
                                            </p>
                                            <div class="row collapse" id="pesquisaDetalhada">
                                                <form class="form-inline ml-2 my-2 my-lg-0 m-2"
                                                    action="{{ route('search.propertie') }}" method="GET" role="search">
                                                    @csrf
                                                    <input class="form-control mr-sm-2" type="search"
                                                        placeholder="Pesquisa de Ativos" aria-label="Search" id="search"
                                                        name="search" autocomplete="off">
                                                    <div class="input-group mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="company">
                                                                Empresa</label>
                                                        </div>
                                                        <select class="custom-select" id="company" name="company">
                                                            <option selected>Selecione</option>
                                                            <option value="MCLG">MCLG Empreendimentos e Participações LTDA
                                                            </option>
                                                            <option value="MARCELO LIMIRIO">Marcelo Henrique Limirio
                                                                Gonçalves
                                                            </option>
                                                            <option value="CLEONICE LIMIRIO">Cleonice Barbosa Limirio
                                                                Gonçalves
                                                            </option>
                                                            <option value="NEO MARCAS">Neo Marcas</option>
                                                            <option value="AGROPECUARIA">Agropecuária Limirio</option>
                                                        </select>
                                                        @if ($errors->has('company'))
                                                            <span class="invalid-feedback" style="display: block;"
                                                                role="alert">
                                                                <strong>{{ $errors->first('company') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i
                                                            class="fas fa-search-location"></i> Buscar</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">

                                <div class="row justify-content-end">
                                    <a href="{{ route('properties.list') }}"
                                        class="btn btn-outline-primary btn-icon btn-3 btn-primary" type="button">
                                        <i class="fas fa-bars"></i> Lista
                                    </a>
                                    <a href="{{ route('properties.create') }}"
                                        class="btn btn-outline-primary btn-icon btn-3 btn-primary" type="button">
                                        <i class="fas fa-plus-square"></i> Novo Ativo
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-header bg-white border-0">
                        <div class="card-body">



                            <!-- Topic Cards -->

                            <div id="cards_landscape_wrap-2">
                                <div class="container">

                                    <div class="row">
                                        @foreach ($properties as $propertie)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-2">
                                                <a href="{{ route('propertie.show', $propertie->id) }}">
                                                    <div class="card card-flyer h-100">
                                                        <div class="text-box">
                                                            <div class="image-box">
                                                                @foreach ($propertie->images as $picture)
                                                                    @if ($loop->first)
                                                                        <img src="{{ env('APP_URL') }}/storage/{{ $picture->path }}"
                                                                            alt="Ativo_{{ $picture->id }}" />
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="text-container mt-2">
                                                                <h6 align="center"><i class="fas fa-tags"></i>
                                                                    {{ $propertie->name }}</h6>
                                                                <p class="mt-2">
                                                                    <i class="fas fa-angle-right"></i>
                                                                    {{ $propertie->company }} <br>
                                                                    <i class="fas fa-angle-right"></i>
                                                                    {{ $propertie->realestate }} <br>
                                                                    <i class="fas fa-angle-right"></i>
                                                                    {{ $propertie->statusproperties }} <br>
                                                                    <i class="fas fa-angle-right"></i>
                                                                    {{ $propertie->valorvenal }} <br>
                                                                    <i class="fas fa-angle-right"></i>
                                                                    {{ $propertie->areatotal }} <b>m<sup>2</sup></b><br>
                                                                    <i class="fas fa-angle-right"></i>
                                                                    {{ $propertie->logradouro }}<br>
                                                                    <i class="fas fa-angle-right"></i>
                                                                    {{ $propertie->bairro }}<br>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                        <div class="container-fluid mt-6">
                                            <div class="row justify-content-center">
                                                {{ $properties->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('layouts.footers.auth')
                </div>
            @endsection
