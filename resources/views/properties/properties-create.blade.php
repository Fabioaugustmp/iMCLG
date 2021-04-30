@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Criar Ativo'),
    'class' => 'col-lg-12'
    ])

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

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row justify-content-end">
                            <a href="{{ '/expense' }}" class="btn btn-icon btn-3 btn-primary" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-coins"></i></span>
                                <span class="btn-inner--text">Histórico de Despesas</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('properties.create.post') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="realestate">
                                        Tipo do Ativo</label>
                                </div>
                                <select class="custom-select" id="realestate" name="realestate">
                                    <!--<option selected>Selecione</option>-->
                                    @foreach ($realestate as $estate)
                                        @if ($estate->status === 1)
                                            <option value="{{ $estate->realestate }}">{{ $estate->realestate }}</option>
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
                                    <!--<option selected>Selecione</option>-->
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
                                            name="cep" value="{{ old('cep') }}">
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
                                            value="{{ old('logradouro') }}">
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
                                            name="bairro" value="{{ old('bairro') }}">
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
                                            placeholder="Cidade / Localidade" name="cidade" value="{{ old('cidade') }}">
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
                                        <input type="text" class="form-control" id="uf" placeholder="Estado / UF" name="uf"
                                            value="{{ old('uf') }}">
                                    </div>
                                </div>
                                @if ($errors->has('uf'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('uf') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="areatotal">Área Total</label>
                                    <input type="number" class="form-control" id="areatotal" name="areatotal"
                                        value="{{ old('areatotal') }}">
                                </div>
                                @if ($errors->has('areatotal'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('areatotal') }}</strong>
                                    </span>
                                @endif
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Área Construída</label>
                                    <input type="number" class="form-control" id="areaconstruida" name="areaconstruida"
                                        value="{{ old('areaconstruida') }}">
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
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Amount" name="valorvenal"
                                            value="{{ old('valorvenal') }}">
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
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Amount"
                                            name="valordaaquisicao" value="{{ old('valordaaquisicao') }}">
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
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Amount" name="valordevenda"
                                            value="{{ old('valordevenda') }}">
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
                                        @foreach ($constructions as $construction)
                                            @if ($construction->status === 1)
                                                <option value="{{ $construction->name }}">{{ $construction->name }}
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
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-upload"></i> Upload de Imagens
                                </button>

                                @if ($errors->has('pictures'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('pictures') }}</strong>
                                    </span>
                                @endif

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filesModal">
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
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-image"></i>
                                                    Upload de Imagens</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <input type='file' id="imgInp" name="files[]" accept="application/pdf"
                                                    multiple />
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

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="validationTextarea">Participações Societarias</label>
                                    <table class="table table-striped table-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Sócio</th>
                                                <th scope="col">R$ Investido</th>
                                                <th scope="col">Participação</th>
                                                <th scope="col">Gestor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($associates as $associate)
                                                @if ($associate->status === 1)
                                                    <tr>
                                                        <th scope="row">{{ $associate->id }}</th>
                                                        <td style="text-transform: uppercase">{{ $associate->name }}</td>
                                                        <td>{{ $associate->email }}</td>
                                                        <td>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">R$</span>
                                                                </div>
                                                                <input type="number" class="form-control"
                                                                    aria-label="Amount (to the nearest dollar)" id="currency">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">.00</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <label class="custom-toggle">
                                                                <input type="checkbox" checked>
                                                                <span class="custom-toggle-slider rounded-circle"></span>
                                                            </label>
                                                            <span class="clearfix"></span>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-save" aria-hidden="true"></i>
                            {{ __(' Gravar Ativo') }}</button>
                        <a href="{{ route('properties') }}" class="btn btn-primary mt-4" type="button">
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

            fetch(`https://viacep.com.br/ws/${search}/json/`, options)
                .then(response => {
                    response.json().then(data => showData(data))
                })
                .catch(e => console.log('Deu Erro: ' + e, message))
        })

    </script>
@endsection
