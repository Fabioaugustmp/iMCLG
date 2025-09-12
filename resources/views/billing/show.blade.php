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
                                <h3 class="mb-0">Detalhes da Fatura</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('billing.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                                @can('update', $billing)
                                    <a href="{{ route('billing.edit', $billing) }}" class="btn btn-sm btn-primary">Editar</a>
                                @endcan
                                @can('delete', $billing)
                                    <form action="{{ route('billing.destroy', $billing) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja deletar este item?');">Deletar</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Título:</strong> {{ $billing->title }}
                            </li>
                            <li class="list-group-item">
                                <strong>Imóvel:</strong> {{ $billing->property->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Descrição:</strong> {{ $billing->description }}
                            </li>
                            <li class="list-group-item">
                                <strong>Valor:</strong> R$ {{ number_format($billing->value, 2, ',', '.') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Data de Vencimento:</strong> {{ \Carbon\Carbon::parse($billing->expiration_date)->format('d/m/Y') }}
                            </li>
                            <li class="list-group-item">
                                <strong>Status do Pagamento:</strong>
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
                            </li>
                        </ul>
                        <div class="mt-4">
                             <a href="{{ Storage::url($billing->pdf_path) }}" target="_blank" class="btn btn-primary">Ver PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
