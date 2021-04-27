@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Criar Ativo'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row justify-content-end">
                            <a href="{{ '/expense' }}" class="btn btn-icon btn-3 btn-primary" type="button">
                                <span class="btn-inner--icon"><i class="far fa-edit"></i></span>
                                <span class="btn-inner--text">Editar Ativo</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <h2 class="mb-2 mr-2" style="text-transform: uppercase;"><i class="fas fa-home"></i>
                                    <b>{{ $properties->realestate }}</b>
                                </h2>
                            </div>
                            <hr class="my-3">

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                            </li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach ($properties->images as $picture)
                                                @if ($loop->first)
                                                    <div class="carousel-item active">
                                                    @else
                                                        <div class="carousel-item">
                                                @endif
                                                <img src="{{ env('APP_URL') }}/storage/{{ $picture->path }}"
                                                    class="d-block w-100 rounded" alt="Ativo_{{ $picture->id }}">
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
                    </div>
                    <hr class="my-3"">

                                                                <div class=" row">
                    <div class=" col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="col-10">
                                    <h3 class="card-title"><i class="fa fa-info"></i> Informações do Ativo</h3>
                                </div>

                                <div class="col-2">
                                    <button type="button" class="btn btn-tool" data-toggle="collapse"
                                        data-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="collapseExample">


                                <h3><i class="fas fa-home"></i> Ativo</h3>

                                <div class="form-group has-success">
                                    <label for="realestate">Nome do Ativo</label>
                                    <input type="text" class="form-control" id="realestate"
                                        value="{{ $properties->realestate }}" readonly>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="statuspropertie">Status do Ativo</label>
                                            <input type="text" class="form-control" id="statuspropertie"
                                                name="statuspropertie" value="{{ $properties->statusproperties }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="construction">Tipo de Construção</label>
                                            <input type="text" class="form-control" id="construction" name="construction"
                                                value="{{ $properties->construction }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h3><i class="fas fa-map-marker"></i> Endereço</h3>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="cep">CEP</label>
                                            <input type="text" class="form-control" id="cep" name="cep"
                                                value="{{ $properties->cep }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="logradouro">Endereço - Logradouro</label>
                                            <input type="text" class="form-control" id="logradouro" name="logradouro"
                                                value="{{ $properties->logradouro }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="bairro">Bairro</label>
                                            <input type="text" class="form-control" id="bairro" name="bairro"
                                                value="{{ $properties->bairro }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="cidade">Cidade</label>
                                            <input type="text" class="form-control" id="cidade" name="cidade"
                                                value="{{ $properties->cidade }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="uf">Estado - UF</label>
                                            <input type="text" class="form-control" id="uf" name="uf"
                                                value="{{ $properties->uf }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h3><i class="fas fa-ruler-combined"></i> Área</h3>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="areatotal">Área Total</label>
                                            <input type="text" class="form-control" id="areatotal" name="areatotal"
                                                value="{{ $properties->areatotal }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="areaconstruida">Área Construída</label>
                                            <input type="text" class="form-control" id="areaconstruida"
                                                name="areaconstruida" value="{{ $properties->areaconstruida }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h3><i class="fas fa-funnel-dollar"></i> Valores do Imóvel</h3>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="valorvenal">Valor Venal</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" id="valorvenal" name="valorvenal"
                                                    value="{{ $properties->valorvenal }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="valordaaquisicao">Valor da Aquisição</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" id="valordaaquisicao"
                                                    name="valordaaquisicao" value="{{ $properties->valordaaquisicao }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="valordevenda">Valor de Venda</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" id="valordevenda"
                                                    name="valordevenda" value="{{ $properties->valordevenda }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h3><i class="fas fa-funnel-dollar"></i> Valores do Imóvel</h3>

                                <div class="form-group has-success">
                                    <label for="areaconstruida">Área Construída</label>
                                    <textarea type="text" class="form-control" rows="8"
                                        readonly>{{ $properties->feedback }}</textarea>
                                </div>

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
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Arquivo do ativo dados gerais do ativo</td>
                                                    <td><a href="" type="button" data-toggle="modal"
                                                            data-target="#exampleModal"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></a></td>
                                                    <td><a href="#" target="_blank"><i class="fa fa-download"
                                                                aria-hidden="true"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Arquivo do ativo dados gerais do ativo</td>
                                                    <td><a href=""><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                    <td><a href="#" target="_blank"><i class="fa fa-download"
                                                                aria-hidden="true"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Arquivo do ativo dados gerais do ativo</td>
                                                    <td><a href=""><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                    <td><a href="#" target="_blank"><i class="fa fa-download"
                                                                aria-hidden="true"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf"></iframe>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Download</button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
