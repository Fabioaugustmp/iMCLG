@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Billings</h3>
                            </div>
                            <div class="col text-right">
                                @can('create', App\Models\Billing::class)
                                    <a href="{{ route('billing.create') }}" class="btn btn-sm btn-primary">Add billing</a>
                                @endcan
                            </div>
                        </div>
                    </div>

                 

                    <div class="table-responsive">
                        teste
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Property</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Expiration Date</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">PDF</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($billings as $billing)
                                    <tr>
                                        <td>{{ $billing->title }}</td>
                                        <td><a href="{{ route('propertie.show', $billing->property) }}">{{ $billing->property->name }}</a></td>
                                        <td>{{ $billing->value }}</td>
                                        <td>{{ $billing->expiration_date }}</td>
                                        <td>{{ $billing->payment_status }}</td>
                                        <td><a href="{{ Storage::url($billing->pdf_path) }}" target="_blank">View PDF</a></td>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
