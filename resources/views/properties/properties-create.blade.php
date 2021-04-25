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
                                <span class="btn-inner--icon"><i class="fas fa-coins"></i></span>
                                <span class="btn-inner--text">Histórico de Despesas</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="#">
                            @csrf
                            <hr>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">
                                        Tipo</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Selecione</option>
                                    @foreach ($realestate as $estate)
                                        @if ($estate->status === 1)
                                            <option value="{{ $estate->id }}">{{ $estate->realestate }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect02">
                                        Status do Ativos</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect02">
                                    <option selected>Selecione</option>
                                    @foreach ($statusproperties as $status)
                                        @if ($status->status === 1)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <input type="text" class="form-control" maxlength="9" id="cep" placeholder="CEP">                                        
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="form-group">
                                        <label for="logradouro">Logradouro/Rua</label>
                                        <input type="text" class="form-control" id="logradouro" placeholder="Logradouro / Rua">                                        
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label for="bairro">Bairro</label>
                                        <input type="text" class="form-control" id="bairro" placeholder="Bairro">                                        
                                    </div>
                                </div>
                               
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="localidade">Cidade / Localidade</label>
                                        <input type="text" class="form-control" id="localidade" placeholder="Cidade / Localidade">                                        
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="form-group">
                                        <label for="uf">Estado</label>
                                        <input type="text" class="form-control" id="uf" placeholder="Estado / UF">                                    
                                    </div>
                                </div>                                                                                          
                            </div>
                            <hr>                                                   
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Área Total</label>
                                    <input type="text" class="form-control" id="validationDefault01" value="Área Total"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Área Construída</label>
                                    <input type="text" class="form-control" id="validationDefault02" value="Área Construída"
                                        required>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-4">
                                    <label for="validationDefault01">Valor Venal</label>
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Amount">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="validationDefault01">Valor da Aquisição</label>
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Amount">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="validationDefault01">Valor de Venda</label>
                                    <div class="input-group mb-3">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" class="form-control" aria-label="Amount">
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <div class="form-row">

                                <label for="validationDefault04" class="col-form-label">Que tipo de construção existe no
                                    ativo</label>
                                <div class="col-sm-12">
                                    <select class="custom-select form-control" id="validationDefault04" required>
                                        <option selected disabled value="">Selecione ...</option>
                                        @foreach ($constructions as $construction)
                                            @if ($construction->status === 1)
                                                <option value="{{ $construction->id }}">{{ $construction->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Fotos</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Selecionar Foto(s)</label>
                                    </div>
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
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="validationTextarea">Observações</label>
                                        <textarea class="form-control" id="validationTextarea"
                                            placeholder="Observações gerais do ativo" required></textarea>

                                    </div>
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
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1">Gestor do
                                                            Ativo</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch2">
                                                        <label class="custom-control-label" for="customSwitch2">Gestor do
                                                            Ativo</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3">
                                                        <label class="custom-control-label" for="customSwitch3">Gestor do
                                                            Ativo</label>
                                                    </div>
                                                </td>
                                            </tr>
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
