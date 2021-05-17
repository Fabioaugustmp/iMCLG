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
                                    <h2><i class="far fa-edit"></i> Edicao de Aruivos do Ativo {{ $properties->name }}
                                    </h2>
                                    <small data-toggle="tooltip" data-placement="top"
                                        title="Neste campo um ativo pode ser atualizado! Com todas as informações!"><i
                                            class="fas fa-info-circle"></i></small>

                                </div>
                            </div>
                            <div class="col-6">
                                
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

                                <div class="form-group">
                                    <label for="name">Nome do Ativo</label>
                                    <input type="text" class="form-control" id="name" placeholder="Insira o nome do ativo."
                                        name="name" value="{{ $properties->name }}" readonly>
                                </div>


                                <hr>

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
                                                                data-target="#arquivoModal{{ $file->id }}"><i class="fa fa-eye"
                                                                    aria-hidden="true"></i></a></td>
                                                        <td><a href="{{ env('APP_URL') }}/storage/{{ $file->path }}"
                                                                target="_blank"><i class="fa fa-download"
                                                                    aria-hidden="true"></i></a></td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="arquivoModal{{ $file->id }}" data-backdrop="static"
                                                        data-keyboard="false" tabindex="-1"
                                                        aria-labelledby="arquivoModalLabel{{ $file->id }}" aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="arquivoModalLabel{{ $file->id }}">
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
