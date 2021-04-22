@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Criar Ativo'),
    'class' => 'col-lg-12'
    ])


    <script>
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
            document.getElementById('ibge').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
                document.getElementById('ibge').value = (conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";
                    document.getElementById('ibge').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

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
                                        <option value="{{ $estate->id }}">{{ $estate->realestate }}</option>
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
                                    <option value="1">Em Carteira</option>
                                    <option value="2">Ativo</option>
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" name="cep" id="cep">CEP</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="CEP" aria-label="cep"
                                            aria-describedby="cep" name="cep" value="" size="10" maxlength="9"
                                            onblur="pesquisacep(this.value);">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cidade">Cidade</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Cidade" aria-label="cidade"
                                            aria-describedby="cidade" name="cidade" value="">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="uf">UF</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="UF" aria-label="cep"
                                            aria-describedby="uf">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rua">Rua</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Rua" aria-label="cep"
                                            aria-describedby="rua">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="pais">Pais</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Pais" aria-label="cep"
                                            aria-describedby="pais">
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
                                            <option value="{{ $construction->id }}">{{ $construction->name }}</option>
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
@endsection
