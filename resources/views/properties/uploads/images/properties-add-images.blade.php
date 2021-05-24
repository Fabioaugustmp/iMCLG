    @extends('layouts.app', ['title' => __('Ativos')])

    @section('content')
        @include('partner.partials.header-profile', [
        'title' => __('Ativos'),
        'description' => __('Incluir Imagens'),
        'class' => 'col-lg-12'
        ])

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('partner.create') }}">
                                @csrf
                                <div class="card-header bg-white border-0">
                                    <div class="container">
                                        <div class="form-group">
                                            <label for="partner">Nome do Ativo</label>
                                            <div class="input-group mb-4" id="partner">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Nome do Sócio" type="text"
                                                    name="name" value="{{ $properties->name }}" readonly>
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
                                                            name="email" value="{{ old('email') }}">
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
                                                            maxlength="11" name="cpf" value="{{ old('cpf') }}">
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
                                            <label for="checkbox">Ativar Sócio</label>
                                            <div>
                                                <label class="custom-toggle" id="checkbox">
                                                    <input type="checkbox" name="status">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                                <span class="clearfix"></span>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <button type="submit" class="btn btn-primary btn-outline-primary mt-4"><i class="fa fa-save"
                                                    aria-hidden="true"></i> {{ __('Salvar Imagem') }}</button>
                                            <button type="submit" class="btn btn-primary btn-outline-primary mt-4"><i class="fa fa-save"
                                                    aria-hidden="true"></i> {{ __('Salvar & Adicionar') }}</button>
                                            <a href="{{ route('partners') }}" class="btn btn-primary btn-outline-primary mt-4" type="button">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                <span class="btn-inner--text">Cancelar</span>
                                            </a>
                                        </div>
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
