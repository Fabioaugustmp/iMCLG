@extends('layouts.app', ['title' => __('Ativos')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Criar Ativo'),
    'class' => 'col-lg-12'
    ])


    <style>
        .myButton {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 999;
            /*not working */
        }

        .carousel {
            height: 400px;
        }

        .carousel-inner {
            width: 100%;
            /*this must stay */
            height: 100%;
            /*this must stay */
            /* z-index: 1; //this make the carousel-control unclickable */
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
                                    <h2><i class="far fa-edit"></i> Edicao de Imagens do Ativo {{ $properties->name }}
                                    </h2>
                                    <small data-toggle="tooltip" data-placement="top"
                                        title="Neste campo um ativo pode ser atualizado! Com todas as informações!"><i
                                            class="fas fa-info-circle"></i></small>

                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row justify-content-end">
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
                            action="{{ route('properties.edit.images.put', ['properties' => $properties->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="container">

                                <div class="form-group">
                                    <label for="name">Nome do Ativo</label>
                                    <input type="text" class="form-control" id="name" placeholder="Insira o nome do ativo."
                                        name="name" value="{{ $properties->name }}" readonly>
                                </div>


                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                    class="active">
                                                </li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                @foreach ($properties->images as $picture)
                                                    <div class="item active text-center">
                                                        <a href="{{ route('properties.edit.images.remove', $picture->id) }}" class="btn btn-outline-light myButton"><i
                                                                class="fas fa-times"></i></a>
                                                    </div>
                                                    @if ($loop->first)
                                                        <div class="carousel-item active">
                                                        @else
                                                            <div class="carousel-item">
                                                    @endif
                                                    <img src="{{ env('APP_URL') }}/storage/{{ $picture->path }}"
                                                        class="d-block rounded img-fluid" alt="Ativo_{{ $picture->id }}"
                                                        style="height: auto; width:100%;">
                                            </div>
                                            @endforeach
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="container">
                                <div class="text-start">
                                    <button type="button" class="btn btn-primary btn-outline-primary mt-4"><i
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
