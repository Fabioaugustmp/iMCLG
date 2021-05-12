@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __(''),
    'class' => 'col-lg-12'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">

                        <div class="row mx-2 px-2">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="row justify-content-start">
                                    <form class="form-inline my-2 my-lg-0" action="{{ route('search.propertie') }}"
                                        method="GET" role="search">
                                        @csrf
                                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisa de Ativos"
                                            aria-label="Search" id="search" name="search">

                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i
                                                class="fas fa-search-location"></i> Buscar</button>

                                    </form>

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
                        <!--<div class="row align-items-center">
                                                                                                                        <a href="{{ '/users/create' }}" class="btn btn-icon btn-3 btn-primary" type="button">
                                                                                                                            <span class="btn-inner--icon"><i class="fas fa-coins"></i></span>
                                                                                                                            <span class="btn-inner--text">Histórico de Despesas</span>
                                                                                                                        </a>
                                                                                                                    </div>-->
                    </div>
                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                @foreach ($properties as $propertie)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 p-2">
                                        <div class="card" style="width: 16rem;">
                                            <div id="{{$propertie->id}}" class="carousel slide carousel-fade"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($propertie->images as $picture)
                                                        @if ($loop->first)
                                                            <div class="carousel-item active">
                                                            @else
                                                                <div class="carousel-item">
                                                        @endif
                                                        <img src="{{ env('APP_URL') }}/storage/{{ $picture->path }}"
                                                            alt="Ativo_{{ $picture->id }}"
                                                            class="img-fluid d-block w-100 rounded"
                                                            style="width: 254px; height: 254px;">
                                                </div>
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#{{$propertie->id}}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#{{$propertie->id}}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">{{ $propertie->name }}</h3>
                            <p class="card-text">

                                {{ $propertie->realestate }} <br>
                                {{ $propertie->statusproperties }} <br>
                                {{ $propertie->valorvenal }} R$<br>
                                {{ $propertie->areatotal }}<br>
                                {{ $propertie->logradouro }}<br>
                                {{ $propertie->bairro }}<br>

                            </p>
                            <div class="row justify-content-center">
                                <a href="{{ route('propertie.show', $propertie->id) }}"
                                    class="btn btn-primary btn-outline-primary"><i class="fas fa-search-location"></i>
                                    Visualizar</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>

    @include('layouts.footers.auth')
    </div>
@endsection
