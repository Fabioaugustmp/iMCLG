@extends('layouts.app')

@section('content')
    @include('layouts.breadcrumbs.breadcrumb')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <h3 class="mb-0">Detalhes da Fatura</h3>
                            </div>
                            <div class="col-12 col-md-6 text-md-right">
                                <a href="{{ route('properties.billings', ['property' => $billing->property_id]) }}" class="btn btn-sm btn-primary">Voltar</a>
                                @can('update', $billing)
                                    <a href="{{ route('billing.edit', $billing) }}" class="btn btn-sm btn-primary">Editar</a>
                                @endcan
                                @can('delete', $billing)
                                    <form action="{{ route('billing.destroy', $billing) }}" method="POST" class="d-inline-block">
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
                            <li class="list-group-item px-0">
                                <strong>Título:</strong><br>
                                {{ $billing->title }}
                            </li>
                            <li class="list-group-item px-0">
                                <strong>Imóvel:</strong><br>
                                {{ $billing->property->name }}
                            </li>
                            <li class="list-group-item px-0">
                                <strong>Descrição:</strong><br>
                                <p class="mb-0">{{ $billing->description }}</p>
                            </li>
                            <li class="list-group-item px-0">
                                <strong>Valor:</strong><br>
                                R$ {{ number_format($billing->value, 2, ',', '.') }}
                            </li>
                            <li class="list-group-item px-0">
                                <strong>Data de Vencimento:</strong><br>
                                {{ \Carbon\Carbon::parse($billing->expiration_date)->format('d/m/Y') }}
                            </li>
                            <li class="list-group-item px-0">
                                <strong>Status do Pagamento:</strong><br>
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
                            <li class="list-group-item px-0">
                                <strong>Mês de Referência:</strong><br>
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
                            </li>
                        </ul>
                        <div class="mt-4 d-flex flex-wrap">
                            <!-- View PDF Button -->
                            <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#pdfModal">
                                <i class="fas fa-eye"></i> Visualizar PDF
                            </button>

                            <!-- Download PDF Button -->
                            <a href="{{ Storage::url($billing->pdf_path) }}" download class="btn btn-success m-1">
                                <i class="fas fa-download"></i> Baixar PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <!-- PDF Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="pdfModalLabel">{{ $billing->title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <iframe src="{{ Storage::url($billing->pdf_path) }}" frameborder="0" width="100%" height="500px"></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
@endsection
