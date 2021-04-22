@extends('layouts.app', ['title' => __('Status de Ativos')])

@section('content')
    @include('users.partials.header-profile', [
    'title' => __('Status de Ativos'),
    'description' => __('Listar Status de Ativos'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="card-header bg-white border-0 justify-content-end">
                            <main role="main" class="container">
                                @include('partials.alerts')
                                @yield('content')
                            </main>

                            <div class="row justify-content-end">
                                <a href="{{ route('statusproperties.create') }}" class="btn btn-icon btn-3 btn-primary"
                                    type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-plus-square"></i></span>
                                    <span class="btn-inner--text">Novo Status</span>
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">ID #</th>
                                        <th scope="col" class="sort" data-sort="name">Nome Status</th>
                                        <th scope="col" class="sort" data-sort="budget">Descricao</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col" class="sort">Acoes</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                   
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase"></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase"></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase"></span>
                                                    </div>
                                                </div>
                                            </th>
                                            
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-success">Ativo</span>
                                                </td>
                                            
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-danger">Inativo</span>
                                                </td>


                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href=""><i class="fas fa-user-edit"></i>
                                                            Editar
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
    </div>
@endsection
