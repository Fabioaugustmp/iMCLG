@extends('layouts.app', ['title' => __('Sócios')])

@section('content')
    @include('partner.partials.header-profile', [
    'title' => __('Sócios'),
    'description' => __('Lista Sócios'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row justify-content-end">
                            <a href="{{ route('partner.create') }}"
                                class="btn btn-icon btn-3 mr-4 btn-primary btn-outline-primary" type="button">
                                <i class="fas fa-plus-square"></i> Novo Sócio
                            </a>
                        </div>
                    </div>

                    <main role="main" class="container">
                        @include('partials.alerts')
                        @yield('content')
                    </main>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">ID #</th>
                                        <th scope="col" class="sort" data-sort="name">Nome do Sócio</th>
                                        <th scope="col" class="sort" data-sort="budget">Email</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col" class="sort">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($partners as $partners)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $partners->id }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $partners->name }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-md"
                                                            style="text-transform: uppercase">{{ $partners->email }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </th>
                                            @if ($partners->status === 1)
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-success">Ativo</span>
                                                </td>
                                            @else
                                                <td class="budget">
                                                    <span class="badge badge-pill badge-danger">Inativo</span>
                                                </td>
                                            @endif

                                            <td class="justify-content-center">
                                                <a class="mr-2" href="{{ route('partner.show', $partners->id) }}"><i
                                                    class="fas fa-eye"></i>
                                                <a href="{{ route('partner.edit', $partners->id) }}"><i
                                                        class="fas fa-user-edit"></i>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
