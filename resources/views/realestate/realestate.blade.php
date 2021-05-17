@extends('layouts.app', ['title' => __('Tipos de Ativos')])

@section('content')
    @include('realestate.partials.header-profile', [
    'title' => __('Tipos de Ativos'),
    'description' => __('Listar Tipos'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="card-header bg-white border-0">
                            <main role="main" class="container">
                                @include('partials.alerts')
                                @yield('content')
                            </main>

                            <div class="row align-items-center justify-content-end">
                                <a href="{{ route('realestate.create') }}" class="btn btn-icon btn-3 btn-primary btn-outline-primary"
                                    type="button"><i class="fas fa-plus-square"></i> Novo                                   
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">ID #</th>
                                        <th scope="col" class="sort" data-sort="name">Nome do Ativo</th>
                                        <th scope="col" class="sort" data-sort="budget">Descrição</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col" class="sort">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($realestates as $realestate)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $realestate->id }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $realestate->realestate }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $realestate->description }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            @if ($realestate->status === 1)
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-success">Ativo</span>
                                                </td>
                                            @else
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-danger">Inativo</span>
                                                </td>
                                            @endif


                                            <td class="justify-content-center">
                                                <a class="dropdown-item" href="{{ route('realestate.update', $realestate->id) }}"><i class="fas fa-user-edit"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
