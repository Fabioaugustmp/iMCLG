@extends('layouts.app')

@section('content')
@include('layouts.breadcrumbs.breadcrumb')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Edit Billing</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('billing.update', $billing) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="property_id">Property</label>
                            <select class="form-control" id="property_id" name="property_id" required>
                                @foreach ($properties as $property)
                                <option value="{{ $property->id }}" {{ $billing->property_id == $property->id ? 'selected' : '' }}>{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $billing->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $billing->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="value">Amount</label>
                            <input type="number" class="form-control" id="value" name="value" step="0.01" value="{{ $billing->value }}" required>
                        </div>

                        <div class="form-group">
                            <label for="expiration_date">Expiration Date</label>
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="{{ $billing->expiration_date }}" required>
                        </div>

                        <div class="form-group">
                            <label for="payment_status">Status do Pagamento</label>
                            <select class="form-control" id="payment_status" name="payment_status" required>
                                <option value="unpaid" {{ $billing->payment_status == 'unpaid' ? 'selected' : '' }}>Não pago</option>
                                <option value="paid" {{ $billing->payment_status == 'paid' ? 'selected' : '' }}>Pago</option>
                                <option value="overdue" {{ $billing->payment_status == 'overdue' ? 'selected' : '' }}>Vencido</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="month_reference">Mês de Referência</label>
                            <select class="form-control" id="month_reference" name="month_reference">
                                <option value="">Selecionar Mês</option>
                                <option value="1" {{ $billing->month_reference == 1 ? 'selected' : '' }}>Janeiro</option>
                                <option value="2" {{ $billing->month_reference == 2 ? 'selected' : '' }}>Fevereiro</option>
                                <option value="3" {{ $billing->month_reference == 3 ? 'selected' : '' }}>Março</option>
                                <option value="4" {{ $billing->month_reference == 4 ? 'selected' : '' }}>Abril</option>
                                <option value="5" {{ $billing->month_reference == 5 ? 'selected' : '' }}>Maio</option>
                                <option value="6" {{ $billing->month_reference == 6 ? 'selected' : '' }}>Junho</option>
                                <option value="7" {{ $billing->month_reference == 7 ? 'selected' : '' }}>Julho</option>
                                <option value="8" {{ $billing->month_reference == 8 ? 'selected' : '' }}>Agosto</option>
                                <option value="9" {{ $billing->month_reference == 9 ? 'selected' : '' }}>Setembro</option>
                                <option value="10" {{ $billing->month_reference == 10 ? 'selected' : '' }}>Outubro</option>
                                <option value="11" {{ $billing->month_reference == 11 ? 'selected' : '' }}>Novembro</option>
                                <option value="12" {{ $billing->month_reference == 12 ? 'selected' : '' }}>Dezembro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pdf">PDF</label>
                            <input type="file" class="form-control-file" id="pdf" name="pdf">
                        </div>

                        <button type="submit" class="btn btn-primary"><span class="fa fa-update"></span> Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection