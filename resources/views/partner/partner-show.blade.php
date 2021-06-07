    @extends('layouts.app', ['title' => __('Sócios')])

    @section('content')
        @include('partner.partials.header-profile', [
        'title' => __('Sócios'),
        'description' => __('Editar Sócio'),
        'class' => 'col-lg-12'
        ])

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row justify-content-start m-4">
                                        <h3><i class="fas fa-user"></i> {{ $partner->name }}</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="row justify-content-end mr-3">
                                        <a href="{{ route('partners') }}" class="btn btn-primary btn-outline-primary mt-4"
                                            type="button">
                                            <i class="fas fa-chevron-circle-left" aria-hidden="true"></i> Voltar                                            
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <form role="form" method="POST"
                                action="{{ route('partner.edit.put', ['partner' => $partner->id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-header bg-white border-0">
                                    <div class="container">
                                        <div class="form-group">
                                            <label for="partner">Nome</label>
                                            <div class="input-group mb-4" id="partner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Nome do Sócio" type="text"
                                                    name="name" value="{{ $partner->name }}" readonly>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="partner">Email</label>
                                                    <div class="input-group mb-4" id="partner">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-envelope-open"></i></span>
                                                        </div>
                                                        <input class="form-control" placeholder="Email do Sócio" type="text"
                                                            name="email" value="{{ $partner->email }}" readonly>
                                                    </div>
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="partner">CPF</label>
                                                    <div class="input-group mb-4" id="partner">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="far fa-address-card"></i></span>
                                                        </div>
                                                        <input class="form-control" placeholder="CPF do Sócio" type="numer"
                                                            maxlength="11" name="cpf" value="{{ $partner->cpf }}"
                                                            readonly>
                                                    </div>
                                                    @if ($errors->has('cpf'))
                                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                                            <strong>{{ $errors->first('cpf') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="checkbox">Status Sócio</label>
                                            <div class="col-12 mb-4">
                                                @if ($partner->status === 1)
                                                    <span class="badge badge-pill badge-success">Ativo</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Inativo</span>
                                                @endif
                                                <span class="clearfix"></span>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="container">
                                        <div class="col-12 m-4">
                                            <h3><i class="fas fa-home"></i> Ativos</h3>
                                        </div>

                                        <table id="datatable" class="display table-responsive " style="width:100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>Nome do Ativo</th>
                                                    <th>Valor Venal</th>
                                                    <th>Vl Aquisição</th>
                                                    <th>Vl Venda</th>
                                                    <th>Porcentagem%</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($properties as $propertie)
                                                    <tr align="center">
                                                        <td>{{ $propertie->name }}</td>
                                                        <td>{{ $propertie->valorvenal }}</td>
                                                        <td>{{ $propertie->valordaaquisicao }}</td>
                                                        <td>{{ $propertie->valordevenda }}</td>
                                                        <td>{{ $propertie->valordavenda }}</td>
                                                        <td align="center"><a class="mr-2"
                                                                href="{{ route('propertie.show', $propertie->id) }}"><i
                                                                    class="far fa-eye"></i></a>
                                                            <a href="{{ route('propertie.edit', $propertie->id) }}"><i
                                                                    class="far fa-edit"></i></a>
                                                        </td>
                                                        <td align="center"> </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr align="center">
                                                    <th>Nome do Ativo</th>
                                                    <th>Valor Venal</th>
                                                    <th>Vl Aquisição</th>
                                                    <th>Vl Venda</th>
                                                    <th>Porcentagem%</th>
                                                    <th>Ações</th>
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
