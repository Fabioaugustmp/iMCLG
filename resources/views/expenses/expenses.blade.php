@extends('layouts.app', ['title' => __('Despesas')])

@section('content')
    @include('expenses.partials.header-profile', [
    'title' => __('Despesas'),
    'description' => __('Lista Despesas'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="card-header bg-white border-0">
                            <div class="row justify-content-end">
                                <a href="{{ route('expense.create') }}"
                                    class="btn btn-icon btn-3 btn-primary btn-outline-primary" type="button"><i
                                        class="fas fa-plus-square"></i> Nova despesa
                                </a>
                            </div>
                        </div>
                        <form role="form" method="POST" action="">
                            @csrf
                            <div class="card-header bg-white border-0">
                                <div class="container">
                                    <table id="datatable" class="display table-responsive " style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Ativo</th>
                                                <th>Classe Despesa</th>
                                                <th>Tipo Despesa</th>
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
                                                <td>{{$expense->id_propertie}}</td>
                                                <td>{{$expense->classexpense}}</td>
                                                <td>{{$expense->expensetype}}</td>
                                                <td>{{ date('d-m-Y', strtotime($expense->includedate)) }}</td>
                                                <td>{{date('d-m-Y', strtotime($expense->expiredate))}}</td>
                                                <td>{{date('d-m-Y', strtotime($expense->paymentdate))}}</td>
                                                <td>{{date('d-m-Y', strtotime($expense->competence))}}</td>
                                                <td>R$ {{$expense->value}}</td>
                                                <td class="justify-content-center"><a href="{{ route('expense.show.unique', $expense->id)}}"><i class="far fa-eye"></i></a> </td>
                                                <td class="justify-content-center"><a href="{{ route('expense.edit', $expense->id) }}"><i class="far fa-edit"></i></a> </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Ativo</th>
                                                <th>Classe Despesa</th>
                                                <th>Tipo Despesa</th>
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
