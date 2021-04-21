@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('users.partials.header-profile', [
    'title' => __('Tipo de Ativos'),
    'description' => __('Atualizar Ativo'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        
                        <div class="card-body">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center card-body">
                                    <a href="{{ route('realestate') }}" class="btn btn-icon btn-3 btn-primary" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-stream"></i></span>
                                        <span class="btn-inner--text">Listar Ativos</span>
                                    </a>
                                </div>
                            </div>
                            <form role="form" method="POST" action="{{ route('realestate.create.post') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="realestate">Nome do Ativo</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                        <input readonly class="form-control"
                                            placeholder="{{ __('Tipo do Ativo') }}" type="text" name="realestate"
                                            value="{{ $realestate->realestate }}" required autofocus>
                                    </div>
                                    @if ($errors->has('realestate'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('realestate') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description">Descricao do Ativo</label>
                                    <textarea class="form-control {{ $errors->has('realestate') ? ' has-danger' : '' }}" id="description" rows="5" name="description"
                                        placeholder="Informe uma breve descricao do ativo ..." required value="{{ $realestate->description }}"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <fieldset disabled>
                                    <legend>Status do Ativo</legend>
                                    <div class="form-group">
                                      <label for="">Status Atual do Ativo</label>
                                      <input type="text" id="" value="{{ $realestate->status === 1 ? 'Ativo' : 'Inativo' }}" class="form-control" placeholder="Disabled input">
                                    </div>
                                </fieldset>

                                <div class="form-group">
                                    <label for="status">Selecione Um Novo Status</label>
                                    <div>
                                        <select class="custom-select" id="status" name="status">
                                            <option selected disabled value="{{ $realestate->status }}">Selecione...</option>                                                                                        
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('status'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-plus"
                                            aria-hidden="true"></i> {{ __(' Atualizar ativo') }}</button>
                                </div>
                            </form>
                        </div>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
