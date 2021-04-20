@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('users.partials.header-profile', [
    'title' => __('Despesas'),
    'description' => __('Incluir Despesa'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form role="form" method="POST" action="">
                            @csrf
                            <div  class="card-header bg-white border-0">
                                <span class="input-group-text mb-3" id="basic-addon1">Ativo</span>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">
                                            Tipo Despesa</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Selecione</option>
                                        <option value="1">Manutenção</option>
                                        <option value="2">Impostos</option>
                                        <option value="3">Condomínio</option>
                                    </select>
                                </div>
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">
                                            Classe Despesa</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect02">
                                        <option selected>Selecione</option>
                                        <option value="1">Estaduais</option>
                                        <option value="2">Federais</option>
                                        <option value="3">Municipais</option>
                                    </select>
                                </div>
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Dt. Inclusão</span>
                                    <input type="date" class="form-control" placeholder="Inclusao"
                                        aria-label="DtInclusao" aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Dt. Vencimento</span>
                                    <input type="date" class="form-control" placeholder="Vencimento"
                                        aria-label="DtVencimento" aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Dt. Pagamento</span>
                                    <input type="date" class="form-control" placeholder="Pagamento"
                                        aria-label="DtPagamento" aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Competência</span>
                                    <input type="month" class="form-control" placeholder="Competência" aria-label="CPF do Sócio"
                                        aria-describedby="addon-wrapping">
                                </div>
                                <!--<div class="input-group mb-3">-->
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Valor</span>
                                    <input type="text" class="form-control" placeholder=" Valor R$"
                                        aria-label="Valor Investido" aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Obs</span>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <a href="{{ '/users/create' }}" class="btn btn-icon btn-3 btn-primary" type="button">
                                        <!--<span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>-->
                                        <span class="btn-inner--text">Gravar</span>
                                    </a>
                                    <a href="{{ '/users/create' }}" class="btn btn-icon bt  n-3 btn-primary" type="button">
                                        <!--<span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>-->
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
@endsection
