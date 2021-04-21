@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('users.partials.header-profile', [
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
                            <a href="{{ route('partner.create') }}" class="btn btn-icon btn-3 btn-primary"
                                type="button">
                                <span class="btn-inner--icon"><i class="fas fa-plus-square"></i></span>
                                <span class="btn-inner--text">Novo Sócio</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="">
                            @csrf
                            <div class="card-header bg-white border-0">
                                <table class="table table-bordered table-hover mb-3">
                                    <thead>
                                        <tr>
                                        <th scope="col">Nome Sócio</th>
                                        <th scope="col">Total Investido</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <nav aria-label="Navegação">
                                        <ul class="pagination">
                                            <!--<li class="page-item"><a class="page-link" href="#">Anterior</a></li>-->
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Próxima</a></li>
                                        </ul>
                                    </nav>
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
