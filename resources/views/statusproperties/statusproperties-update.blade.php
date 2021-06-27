@extends('layouts.app', ['title' => __('Status de Ativos')])

@section('content')
    @include('statusproperties.partials.header-profile', [
    'title' => __('Status de Ativos'),
    'description' => __('Atualizar Status'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('statuspropertie.edit', ['statusproperties' => $statusproperties->id]) }}">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="statusproperties">Nome do Status</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                        <input class="form-control"
                                            placeholder="{{ __('Status do Ativo') }}" type="text" name="name"
                                            value="{{ $statusproperties->name }}" required autofocus>
                                    </div>
                                    @if ($errors->has('statusproperties'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('statusproperties') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description">Descricao</label>
                                    <textarea class="form-control {{ $errors->has('statusproperties') ? ' has-danger' : '' }}" id="description" rows="5" name="description"
                                        placeholder="Informe uma breve descricao do ativo ..." required>{{ $statusproperties->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <fieldset disabled>
                                    <legend>Status</legend>
                                    <div class="form-group">
                                      <label for="">Status Atual</label>
                                      <input type="text" id="" value="{{ $statusproperties->status === 1 ? 'Ativo' : 'Inativo' }}" class="form-control" placeholder="Disabled input">
                                    </div>
                                </fieldset>

                                <div class="form-group">
                                    <label for="status">Selecione Um Novo Status</label>
                                    <div>
                                        <select class="custom-select" id="status" name="status" required>
                                            <option selected disabled value="">Selecione...</option>                                                                                        
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

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary mt-4 btn-outline-primary"><i class="fas fa-sync"
                                            aria-hidden="true"></i> {{ __(' Atualizar') }}</button>
                                    <a href="{{ route('statusproperties')}}" class="btn btn-primary mt-4 btn-outline-primary"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
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
