@extends('layouts.app', ['title' => __('Tipos de Anexo')])

@section('content')
    @include('filetype.partials.header-profile', [
    'title' => __('Tipos de Anexo'),
    'description' => __('Criar Tipo de Anexo'),
    'class' => 'col-lg-12'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('filetype.create.post') }}">
                                @csrf

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label for="name">Tipo de Anexo</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Tipo de Anexo') }}" type="text" name="name"
                                            value="{{ old('name') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="description">Descricao</label>
                                    <textarea class="form-control {{ $errors->has('description') ? ' has-danger' : '' }}" id="description" rows="5" name="description"
                                        placeholder="Informe uma breve descricao do Tipo de Anexo ..." required value="{{ old('description') }}"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div>
                                        <select class="custom-select" id="status" name="status">
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

                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary btn-outline-primary mt-4"><i class="fa fa-check"
                                            aria-hidden="true"></i> {{ __('Salvar') }}</button>
                                    <a href="{{ route('filetypes')}}" class="btn btn-primary btn-outline-primary mt-4"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
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
