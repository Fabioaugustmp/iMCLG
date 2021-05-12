@extends('layouts.app', ['title' => __('Tipos Construcao')])

@section('content')
    @include('users.partials.header-profile', [
    'title' => __('Tipos de Construção'),
    'description' => __('Listar Tipos de Construção'),
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
                                <a href="{{ route('construction.create') }}" class="btn btn-icon btn-3 btn-primary"
                                    type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-plus-square"></i></span>
                                    <span class="btn-inner--text">Novo</span>
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">ID #</th>
                                        <th scope="col" class="sort" data-sort="name">Tipo de Construção</th>
                                        <th scope="col" class="sort" data-sort="budget">Descrição</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col" class="sort">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($constructions as $construction)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $construction->id }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $construction->name }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $construction->description }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            @if ($construction->status === 1)
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-success">Ativo</span>
                                                </td>
                                            @else
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-danger">Inativo</span>
                                                </td>
                                            @endif

                                            <td class="justify-content-center">
                                                <a class="dropdown-item" href="{{ route('construction.show' , $construction->id ) }}"><i class="fas fa-user-edit"></i></a>
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
