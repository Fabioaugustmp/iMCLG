@extends('layouts.app', ['title' => __('Ativos')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __('Lista Despesas'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="card-header bg-white border-0">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row justify-content-start">
                                        <h2><i class="far fa-hand-point-right"></i> {{ $properties->name }}</h2>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row justify-content-end">
                                        <a href="{{ route('propertie.show', $properties->id) }}"
                                            class="btn btn-icon btn-3 btn-primary btn-outline-primary" type="button"><i
                                                class="fas fa-chevron-circle-left"></i> Voltar
                                        </a>
                                        <a href="{{ route('expense.create', $properties->id) }}"
                                            class="btn btn-icon btn-3 btn-primary btn-outline-primary" type="button"><i
                                                class="fas fa-plus-square"></i> Nova despesa
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form role="form" method="POST"
                            action="{{ route('expense.show.propertie.search', ['properties' => $properties->id]) }}">
                            @csrf
                            <div class="card-header bg-white border-0">
                                <div class="container">
                                    <p>
                                        <button class="btn btn-primary" type="button" data-toggle="collapse"
                                            data-target="#pesquisaDetalhada" aria-expanded="false"
                                            aria-controls="pesquisaDetalhada">
                                            <i class="fas fa-search"></i> Pesquisa
                                        </button>
                                    </p>
                                    <div class="row collapse" id="pesquisaDetalhada">
                                        <div class="col-12">
                                            <label for="partner">Selecione o tipo de data, para pesquisa.</label>
                                            <select class="custom-select" id="dates" name="dates">                                                
                                                <option value="includedate">Data de Inclusão</option>
                                                <option value="expiredate">Data Vencimento
                                                </option>
                                                <option value="paymentdate">Data de Pagamento
                                                </option>
                                                <option value="competence">Competência</option>
                                            </select>
                                            @if ($errors->has('dates'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('dates') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <hr>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <div class="form-group">
                                                <label for="partner">Data Inicial
                                                </label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-minus"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Data Inicial"
                                                        aria-label="DtInclusao" aria-describedby="addon-wrapping"
                                                        name="datainicial" value="{{ old('datainicial') }}">
                                                </div>
                                                @if ($errors->has('datainicial'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('datainicial') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                                            <div class="form-group">
                                                <label for="partner">Data Final
                                                </label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Data Final"
                                                        aria-label="" aria-describedby="addon-wrapping" name="datafinal"
                                                        value="{{ old('datafinal') }}">
                                                </div>
                                                @if ($errors->has('datafinal'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('datafinal') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success btn-outline-success"><i
                                                    class="fas fa-search"></i> Pesquisar</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="container">
                                    <table id="datatable" class="display table-responsive " style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tipo Despesa</th>
                                                <th>Classe Despesa</th>
                                                <th>Data Inclusao</th>
                                                <th>Data Final</th>
                                                <th>Data Pagamento</th>
                                                <th>Competencia</th>
                                                <th>Valor</th>
                                                <th>Visualizar</th>
                                                <th>Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($expenses as $expense)
                                                <tr align="center">
                                                    <td>{{ $expense->expensetype }}</td>
                                                    <td>{{ $expense->classexpense }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($expense->includedate)) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($expense->expiredate)) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($expense->paymentdate)) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($expense->competence)) }}</td>
                                                    <td>R$ {{ $expense->value }}</td>
                                                    <td align="center"><a
                                                            href="{{ route('expense.show.unique', $expense->id) }}"><i
                                                                class="far fa-eye"></i></a> </td>
                                                    <td align="center"><a
                                                            href="{{ route('expense.edit', $expense->id) }}"><i
                                                                class="far fa-edit"></i></a> </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr align="center">
                                                <th>Tipo Despesa</th>
                                                <th>Classe Despesa</th>
                                                <th>Data Inclusao</th>
                                                <th>Data Final</th>
                                                <th>Data Pagamento</th>
                                                <th>Competencia</th>
                                                <th>Valor</th>
                                                <th>Visualizar</th>
                                                <th>Editar</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
