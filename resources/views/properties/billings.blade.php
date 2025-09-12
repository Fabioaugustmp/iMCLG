@extends('layouts.app')

@section('content')
@include('layouts.breadcrumbs.breadcrumb')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <h3 class="mb-0">Faturas de {{ $property->name }}</h3>
                        </div>
                        <div class="col-12 col-md-6 text-md-right mt-3 mt-md-0">
                            <a href="{{ route('propertie.show', $property) }}" class="btn btn-sm btn-primary">Retornar</a>
                            @can('create', App\Models\Billing::class)
                            <a href="{{ route('billing.create', ['property_id' => $property->id]) }}" class="btn btn-sm btn-primary">Adicionar Fatura</a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="list-group list-group-flush">
                    @forelse ($billings as $billing)
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                <h4 class="mb-2">{{ $billing->title }}</h4>
                                <p class="mb-1"><strong>Valor Total:</strong> R$ {{ number_format($billing->value, 2, ',', '.') }}</p>
                                <p class="mb-1"><strong>Data de Vencimento:</strong> {{ \Carbon\Carbon::parse($billing->expiration_date)->format('d/m/Y') }}</p>
                                <p class="mb-1"><strong>Mês de Referência:</strong>
                                    @php
                                        $months = [
                                            1 => 'Janeiro',
                                            2 => 'Fevereiro',
                                            3 => 'Março',
                                            4 => 'Abril',
                                            5 => 'Maio',
                                            6 => 'Junho',
                                            7 => 'Julho',
                                            8 => 'Agosto',
                                            9 => 'Setembro',
                                            10 => 'Outubro',
                                            11 => 'Novembro',
                                            12 => 'Dezembro',
                                        ];
                                    @endphp
                                    {{ $billing->month_reference ? $months[$billing->month_reference] : 'N/A' }}
                                </p>
                                <p class="mb-0"><strong>Status Pagamento:</strong>
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
                                @if (Auth::user()->role === 'admin')
                                <p class="mb-0 mt-1"><strong>Status:</strong>
                                    @if ($billing->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </p>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-lg-end flex-wrap">
                                @can('view', $billing)
                                <a href="{{ route('billing.show', $billing) }}" class="btn btn-sm btn-outline-success m-1"><i class="fas fa-info-circle"></i> Detalhar</a>
                                <a href="{{ Storage::url($billing->pdf_path) }}" target="_blank" class="btn btn-sm btn-outline-info m-1"><i class="fas fa-file-pdf"></i> PDF</a>
                                @endcan

                                @can('update', $billing)
                                <a href="{{ route('billing.edit', $billing) }}" class="btn btn-sm btn-outline-warning m-1"><i class="fas fa-pencil-alt"></i> Editar</a>
                                @endcan

                                @can('delete', $billing)
                                <form action="{{ route('billing.destroy', $billing) }}" method="POST" class="d-inline m-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja alterar o status deste item?');">
                                        <i class="far fa-trash-alt"></i> 
                                        @if ($billing->active)
                                            Deletar
                                        @else
                                            Ativar
                                        @endif
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item">
                        <div class="text-center">
                            <p class="mb-0">Nenhuma fatura encontrada para este imóvel.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                @if ($billings->hasPages())
                <div class="card-footer py-4">
                    {{ $billings->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

@include('layouts.footers.auth')
</div>
@endsection

