@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('users.partials.header-profile', [
    'title' => __('Sócios'),
    'description' => __('Incluir Sócio'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form role="form" method="POST" action="">
                            @csrf
                            <div class="card-header bg-white border-0">
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Nome</span>
                                    <input type="text" class="form-control" placeholder=" Nome do Sócio"
                                        aria-label="Nome do Sócio" aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">CPF</span>
                                    <input type="number" class="form-control" placeholder=" CPF" aria-label="CPF do Sócio"
                                        aria-describedby="addon-wrapping">
                                </div>
                                <!--<div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="checkbox" value=""
                                            aria-label="Status do Sócio">
                                    </div>
                                    <span class="input-group-text" id="basic-addon1">Ativo</span>
                                   <input type="Ativo" class="form-control" aria-label="Status">
                                </div>-->
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                    <input type="checkbox" aria-label="Status do Sócio">
                                    </div>
                                </div>
                                    <span class="input-group-text" id="basic-addon1">Ativo</span>
                                </div>
                                <div class="input-group-prepend mb-3">
                                    <span class="input-group-text" id="addon-wrapping">Total Investido</span>
                                    <input type="text" class="form-control" placeholder=" Valor R$"
                                        aria-label="Valor Investido" aria-describedby="addon-wrapping">
                                </div>
                                <table class="table table-bordered table-hover mb-3">
                                    <thead>
                                        <tr>
                                        <th scope="col">Imovel</th>
                                        <th scope="col">Valor Investido</th>
                                        <th scope="col">Participação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-save"
                                            aria-hidden="true"></i> {{ __(' Gravar Sócio') }}</button>
                                        <a href="{{ route('partners') }}" class="btn btn-primary mt-4" type="button">
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
@endsection
