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

        .container-table {
            padding: 2rem 0rem;
        }

        h4 {
            margin: 2rem 0rem 1rem;
        }

        .img-fluid:hover {
            transform: scale(1.5);
        }

        .table-image {

            td,
            th {
                vertical-align: middle;
            }
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
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Insira o nome do ativo." name="name" value="{{ $properties->name }}"
                                        readonly>
                                </div>

                                <hr>

                                <div class="table-responsive container-table">
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Imagem</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($properties->images as $picture)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="media align-items-center w-75">
                                                            <img src="{{ env('APP_URL') }}/storage/{{ $picture->path }}"
                                                                class="img-fluid img-thumbnail table-image"
                                                                alt="Ativo_{{ $picture->id }}"
                                                                style="height: auto; width:100%;">
                                                        </div>
                                                    </th>
                                                    <td>
                                                        {{ $picture->path }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('properties.edit.images.remove', $picture->id) }}"
                                                            class="btn btn-outline-warning"><i
                                                                class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
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
