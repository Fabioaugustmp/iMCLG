@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('properties.partials.header-profile', [
    'title' => __('Ativos'),
    'description' => __(''),
    'class' => 'col-lg-12'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">

                        <div class="row mx-2 px-2">                            
                            <div class="col-12">

                                <div class="row justify-content-end">
                                    <a href="{{ route('properties') }}"
                                        class="btn btn-outline-primary btn-icon btn-3 btn-primary" type="button">
                                        <i class="fab fa-buromobelexperte"></i> Card
                                    </a>
                                    <a href="{{ route('properties.create') }}"
                                        class="btn btn-outline-primary btn-icon btn-3 btn-primary" type="button">
                                        <i class="fas fa-plus-square"></i> Novo Ativo
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="container">
                            <table id="datatable" class="display table-responsive " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Status</th>
                                        <th>CEP</th>
                                        <th>Estado</th>
                                        <th>Valor Venal</th>
                                        <th>Área Total</th>
                                        <th>Construção</th>
                                        <th>Visualizar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $propertie)
                                        <tr class="justify-cotent-center">
                                            <td>{{ $propertie->name }}</td>
                                            <td>{{ $propertie->realestate }}</td>
                                            <td>{{ $propertie->statusproperties }}</td>
                                            <td>{{ $propertie->cep }}</td>
                                            <td>{{ $propertie->uf }}</td>
                                            <td>{{ $propertie->valorvenal }}</td>
                                            <td>{{ $propertie->areatotal }}</td>
                                            <td>{{ $propertie->construction }}</td>
                                            <td align="center"><a href="{{ route('propertie.show', $propertie->id) }}"><i
                                                        class="far fa-eye"></i></a> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Tipo</th>
                                        <th>Status</th>
                                        <th>CEP</th>
                                        <th>Estado</th>
                                        <th>Valor Venal</th>
                                        <th>Área Total</th>
                                        <th>Construção</th>
                                        <th>Visualizar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection
