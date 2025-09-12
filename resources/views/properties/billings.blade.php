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
                            <h3 class="mb-0">Billings for {{ $property->name }}</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('propertie.show', $property) }}" class="btn btn-sm btn-primary">Retornar</a>
                            @can('create', App\Models\Billing::class)
                            <a href="{{ route('billing.create') }}" class="btn btn-sm btn-primary">Adicionar Fatura</a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="table-responsive align-items-center table-flush">
                    <div class="col-md-auto mt-4 mb-4">
                        <div class="card">
                            <div class="card-body align-items-stretch pt-4 p-3">
                                <div>
                                    <ul class="list-group">
                                        @foreach ($billings as $billing)
                                        <li class="list-group-item border-0 d-flex justify-content-between align-items-center p-4 mb-2 bg-gray-500 border-radius-lg">

                                            <div class="d-flex flex-column">
                                                <h6 class="mb-3 text-lg">{{ $billing->title }}</h6>
                                                <span class="mb-2">Valor Total: <span class="text-dark font-weight-bold ms-sm-2">{{ $billing->value }}</span></span>
                                                <span class="mb-2">Data de Vencimento: <span class="text-dark ms-sm-2 font-weight-bold">{{ $billing->expiration_date }}</span></span>
                                                <span class="">Status Pagamento:
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
                                                </span>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                @can('view', $billing)
                                                <a href="{{ route('billing.show', $billing) }}" class="btn btn-md-4 btn-outline-success text-md mx-1"><i class="fas fa-info-circle text-md"></i>Detalhar</a>
                                                <a href="#" class="btn btn-md-4 btn-outline-info text-md mx-1"><i class="fas fa-file-pdf text-md"></i> PDF</a>
                                                @endcan

                                                @can('delete', $billing)
                                                <form action="{{ route('billing.destroy', $billing) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger text-md px-3 mb-0" onclick="return confirm('Are you sure you want to delete this item?');">
                                                        <i class="far fa-trash-alt me-2"></i>Delete
                                                    </button>
                                                </form>
                                                @endcan

                                                @can('update', $billing)
                                                <a href="{{ route('billing.edit', $billing) }}" class="btn btn-md-4 m-2 btn-outline-warning text-md px-3 mb-0">
                                                    <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>Edit
                                                </a>
                                                @endcan
                                            </div>

                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Expiration Date</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billings as $billing)
                                <tr>
                                    <td>{{ $billing->title }}</td>
                                    <td>{{ $billing->value }}</td>
                                    <td>{{ $billing->expiration_date }}</td>
                                    <td>{{ $billing->payment_status }}</td>
                                    <td class="text-right">
                                        @can('view', $billing)
                                        <a href="{{ route('billing.show', $billing) }}" class="btn btn-sm btn-info">View</a>
                                        @endcan
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
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
    @endsection
