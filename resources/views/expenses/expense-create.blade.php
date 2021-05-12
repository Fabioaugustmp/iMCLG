@extends('layouts.app', ['title' => __('Usuários')])

@section('content')
    @include('users.partials.header-profile', [
    'title' => __('Despesas'),
    'description' => __('Incluir Despesa'),
    'class' => 'col-lg-12'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form role="form" method="POST" action="{{route('expense.create.post')}}">
                            @csrf
                            <div class="card-header bg-white border-0">
                                <div class="container">
                                    <div class="form-group">
                                        <label for="partner">Ativos</label>
                                        <div class="input-group mb-4" id="partner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                                            </div>
                                            <select class="form-control" name="id_propertie" style="text-transform: uppercase">
                                                
                                                @foreach ($properties as $propertie)
                                                    <option value="{{ $propertie->id }}">{{ $propertie->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('id_propertie'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('id_propertie') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="partner">Tipo de Despesa</label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-money-coins"></i></span>
                                                    </div>
                                                    <select class="form-control"  name="expensetype">                                                        
                                                        @foreach ($expensetypes as $expensetype)                                                      
                                                            @if ($expensetype->status === 1)
                                                                <option value="{{ $expensetype->name }}">
                                                                    {{ $expensetype->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('expensetype'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('expensetype') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="partner">Classe de Despesa</label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                    </div>
                                                    <select class="form-control" name="classexpense">                                                          
                                                        @foreach ($classexpenses as $classexpense)
                                                            @if ($classexpense->status === 1)
                                                                <option value="{{ $classexpense->name }}">
                                                                    {{ $classexpense->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('classexpense'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('classexpense') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="partner">Data de Inclusão</label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-check"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Inclusao"
                                                        aria-label="DtInclusao" aria-describedby="addon-wrapping" name="includedate" value="{{ old('includedate')}}">
                                                </div>
                                                @if ($errors->has('includedate'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('includedate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="partner">Data Vencimento</label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-times"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Vencimento"
                                                        aria-label="DtVencimento" aria-describedby="addon-wrapping" name="expiredate" value="{{ old('expiredate') }}">
                                                    </select>
                                                </div>
                                                @if ($errors->has('expiredate'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('expiredate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="partner">Data de Pagamento</label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar-minus"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Inclusao"
                                                        aria-label="DtInclusao" aria-describedby="addon-wrapping" name="paymentdate" value="{{ old('paymentdate') }}">
                                                </div>
                                                @if ($errors->has('paymentdate'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('paymentdate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="partner">Competência
                                                </label>
                                                <div class="input-group mb-4" id="partner">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="far fa-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="Competência"
                                                        aria-label="" aria-describedby="addon-wrapping" name="competence" value="{{ old('competence') }}">
                                                </div>
                                                @if ($errors->has('competence'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('competence') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="partner">Valor
                                        </label>
                                        <div class="input-group mb-4" id="partner">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Valor da Despesa" name="value" value="{{ old('value') }}">
                                        </div>
                                        @if ($errors->has('value'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('value') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="partner">Observações
                                        </label>
                                        <div class="input-group mb-4" id="observations">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-stream"></i></span>
                                            </div>
                                            <textarea class="form-control" placeholder="Observações gerais da despesa..." name="observations" value="{{ old('observations') }}"></textarea>
                                        </div>
                                        @if ($errors->has('observations'))
                                            <span class="invalid-feedback" styl  e="display: block;" role="alert">
                                                <strong>{{ $errors->first('observations') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary btn-outline-primary mt-4"><i class="fa fa-save"
                                                aria-hidden="true"></i> {{ __(' Gravar Despesa') }}</button>
                                        <a href="{{ route('expense') }}" class="btn btn-primary btn-outline-primary mt-4" type="button">
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
