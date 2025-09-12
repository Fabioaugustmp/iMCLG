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
                                <h3 class="mb-0">Detalhes de Fatura</h3>
                            </div>
                            <div class="col text-right">
                                @can('update', $billing)
                                    <a href="{{ route('billing.edit', $billing) }}" class="btn btn-sm btn-primary">Edit</a>
                                @endcan
                                @can('delete', $billing)
                                    <form action="{{ route('billing.destroy', $billing) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $billing->title }}</p>
                        <p><strong>Property:</strong> {{ $billing->property->name }}</p>
                        <p><strong>Description:</strong> {{ $billing->description }}</p>
                        <p><strong>Amount:</strong> {{ $billing->value }}</p>
                        <p><strong>Expiration Date:</strong> {{ $billing->expiration_date }}</p>
                        <p><strong>Status do Pagamento:</strong>
                            @switch($billing->payment_status)
                                @case('paid')
                                    <span class="badge badge-success">Pago</span>
                                    @break
                                @case('unpaid')
                                    <span class="badge badge-warning">Não pago</span>
                                    @break
                                @case('overdue')
                                    <span class="badge badge-danger">Vencido</span>
                                    @break
                                @default
                                    <span class="badge badge-secondary">{{ $billing->payment_status }}</span>
                            @endswitch
                        </p>
                        <a href="{{ Storage::url($billing->pdf_path) }}" target="_blank" class="btn btn-primary">View PDF</a>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
