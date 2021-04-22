@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('users.partials.header-profile', [
    'title' => _('Usuários')
    ])
    @include('users.users-delete')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row justify-content-end">
                            <a href="{{ route('users/create') }}" class="btn btn-icon btn-3 btn-primary" type="button">
                                <span class="btn-inner--icon"><i class="fas fa-user-plus"></i></span>

                                <span class="btn-inner--text">Criar usuário</span>

                            </a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="col">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Listagem de Usuários</h3>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush table-striped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">ID #</th>
                                                <th scope="col" class="sort" data-sort="name">Nome</th>
                                                <th scope="col" class="sort" data-sort="budget">Email</th>
                                                <th scope="col" class="sort" data-sort="status">Perfil de Usuário</th>                                                
                                                <th scope="col" class="sort">Acoes</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="media align-items-center">                                                         
                                                            <div class="media-body">
                                                                <span class="name mb-0 text-md" style="text-transform: uppercase">{{ $user->id }}</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th scope="row">
                                                        <div class="media align-items-center">                                                         
                                                            <div class="media-body">
                                                                <span class="name mb-0 text-md" style="text-transform: uppercase">{{ $user->name }}</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td class="budget">
                                                        {{ $user->email}}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">
                                                            <i class="bg-warning"></i>
                                                            <span class="status text-md">Administrador</span>
                                                        </span>
                                                    </td>                                                                                                        
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="{{ route('users.list', $user->id) }}"><i class="fas fa-user-edit"></i> Editar Usuário</a>                                                                
                                                                <a class="dropdown-item" href="{{ route('users.list', $user->id) }}"><i class="fas fa-user-slash"></i> Desativar Usuário</a>
                                                                <a class="dropdown-item"><i class="fas fa-user-times"></i> Excluir Usuário</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                            @endforeach                                          
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer py-4">
                                    <nav aria-label="...">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <i class="fas fa-angle-right"></i>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
