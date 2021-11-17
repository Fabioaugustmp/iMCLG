@extends('layouts.app', ['title' => __('Ativos')])


@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Listar Ativos'),
    'class' => 'col-lg-12'
    ])

    <style>
        #map {
            position: absolute;
            top: 0, bottom: 0, left: 0, right: 0, height: 512px
        }

        .gnw-map.fade {
            transition: opacity .15s linear;
        }

        .gnw-map.fade:not(.show) {
            opacity: 0;
        }

        tr {
            justify-items: center;
            align-content: flex-end;
            text-transform: uppercase;
        }


    </style>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row x-2 px-4">
                            <div class="col-lg-6 col-md-6">
                                <div class="row justify-content-start">
                                    <a href="{{ route('properties') }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary" type="button">
                                        <i class="fas fa-grip-horizontal"></i> Ativos
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="row justify-content-end">
                                    <a href="{{ route('expense.show.propertie', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary" type="button">
                                        <i class="fas fa-coins"></i> Despesas
                                    </a>
                                    <a href="{{ route('properties.add.files', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary" type="button">
                                        <i class="far fa-folder-open"></i> Anexos
                                    </a>
                                    <a href="{{ route('propertie.edit', $properties->id) }}"
                                        class="btn btn-icon btn-3 btn-primary btn-outline-primary" type="button">
                                        <i class="far fa-edit"></i> Editar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <main role="main" class="container">
                        @include('partials.alerts')
                        @yield('content')
                    </main>
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <h2 class="mb-2 mr-2" style="text-transform: uppercase;"><i class="fas fa-home"></i>
                                    <b>{{ $properties->name }}</b>
                                </h2>
                            </div>
                            <hr class="my-3">

                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-8 col-sm-8">
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
                                                    class="d-block w-100 rounded img-fluid" alt="Ativo_{{ $picture->id }}">
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
                                <div class="col-12 mt-3">
                                    <h2 class="card-title"><i class="fa fa-info"></i> Informações do Ativo</h2>
                                </div>
                            </div>


                            <div class="card-body">
                                <h3><i class="fas fa-map-marked"></i> Localização</h3>
                                @if ($properties->latitude != null && $properties->longitude != null)
                                    @map([
                                    'lat' => $properties->latitude,
                                    'lng' => $properties->longitude,
                                    'zoom' => 14,
                                    'markers' => [
                                    [
                                    'title' => $properties->name,
                                    'lat' => $properties->latitude,
                                    'lng' => $properties->longitude,
                                    'url' => $url,
                                    'popup' => '<h3>Navegar - ' . $properties->name . '</h3>
                                    <p><i class="fas fa-street-view"></i> Clique <a href="'. $url .'"
                                            target="_blank">aqui</a>, para navegar.</p>',
                                    ],
                                    ],
                                    ])

                                    <div class="row mt-5">
                                        <div class="col-6">
                                            <a href="{{ $url }}" target="_blank" class="btn btn-outline-primary"><i
                                                    class="fas fa-location-arrow"></i> Navegar</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                                        <span class="alert-inner--icon"><i class="fas fa-exclamation-triangle"></i></span>
                                        <span class="alert-inner--text"><strong>Atenção!</strong> <br><br> Latitude e
                                            Longitude do ativo não informadas! <br> Clique em <a
                                                href="{{ route('propertie.edit', $properties->id) }}">aqui</a>, para
                                            inserir geolocalização.</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <hr>

                                <h3><i class="fas fa-home"></i> Ativo</h3>

                                <div class="form-group has-success">
                                    <label for="realestate">Nome do Ativo</label>
                                    <input type="text" class="form-control" id="realestate"
                                        value="{{ $properties->name }}" readonly>
                                </div>
                                <div class="form-group has-success">
                                    <label for="realestate">Empresa</label>
                                    <input type="text" class="form-control" id="realestate"
                                        value="{{ $properties->company }}" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="statuspropertie">Tipo do Ativo</label>
                                            <input type="text" class="form-control" id="statuspropertie"
                                                name="statuspropertie" value="{{ $properties->realestate }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="statuspropertie">Status do Ativo</label>
                                            <input type="text" class="form-control" id="statuspropertie"
                                                name="statuspropertie" value="{{ $properties->statusproperties }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6">
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
                                            <label for="areaconstruida">Área Construída/Privativa</label>
                                            <input type="text" class="form-control" id="areaconstruida"
                                                name="areaconstruida" value="{{ $properties->areaconstruida }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <h3><i class="fas fa-funnel-dollar"></i> Valores do Imóvel</h3>

                                <div class="row">
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
                                            <label for="dataaquisicao">Data da Aquisição</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="dataaquisicao"
                                                    name="dataaquisicao" value="{{ $properties->dataaquisicao }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
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
                                            <label for="valordevenda">Valor Venda/Avaliação</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">R$</span>
                                                </div>
                                                <input type="text" class="form-control" id="valordevenda"
                                                    name="valordevenda" value="{{ $properties->valordevenda }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group has-success">
                                            <label for="dataavaliacao">Data Venda/Avaliação</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="dataavaliacao"
                                                    name="dataavaliacao" value="{{ $properties->dataavaliacao }}" readonly>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>                              

                                <h3><i class="fas fa-font"></i> Observações do Ativo</h3>

                                <div class="form-group has-success">
                                    <label for="feedback">Observações</label>
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
                                                    <th scope="col">Tipo do Arquivo</th>
                                                    <th scope="col">Visualizar</th>
                                                    <th scope="col">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties->files as $file)
                                                    <tr>
                                                        <th scope="row">{{ $file->id }}</th>
                                                        <td>{{ $file->name }}</td>
                                                        <td>{{ $file->filetype }}</td>
                                                        <td><a href="#" class="btn btn-outline-success" type="button" data-toggle="modal"
                                                                data-target="#arquivoModal{{ $file->id }}"><i
                                                                    class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                        <td><a class="btn btn-outline-primary" href="{{ env('APP_URL') }}/storage/{{ $file->path }}"
                                                                download="{{$file->name}}"><i class="fa fa-download"
                                                                    aria-hidden="true"></i></a></td>
                                                    </tr>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="arquivoModal{{ $file->id }}"
                                                        data-backdrop="static" data-keyboard="false" tabindex="-1"
                                                        aria-labelledby="arquivoModalLabel{{ $file->id }}"
                                                        aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title"
                                                                        id="arquivoModalLabel{{ $file->id }}">
                                                                        {{ $file->name }} - Arquivo -
                                                                        {{ $file->filetype }}</h3>
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
                                                                        <a type="button" class="btn btn-outline-primary"
                                                                            href="{{ env('APP_URL') }}/storage/{{ $file->path }}"
                                                                            download="{{$file->name}}"><i class="fas fa-download"></i>
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

                                <br>

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
                                                                    value="{{ $partner->pivot->partial_value }}"
                                                                    readonly>
                                                            </div>
                                                        </td>
                                                        <td class="text-center" style="font-size: 2rem;">
                                                            @if ($partner->pivot->manager === 1)
                                                                <i class="fas fa-user-tie"></i>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
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


    @include('layouts.footers.auth')

@endsection
