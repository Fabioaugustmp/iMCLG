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
                                <a href="{{ route('billing.create') }}" class="btn btn-sm btn-primary">Add billing</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Property</th>
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
                                        <td>{{ $billing->property->name }}</td>
                                        <td>{{ $billing->value }}</td>
                                        <td>{{ $billing->expiration_date }}</td>
                                        <td>{{ $billing->payment_status }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('billing.show', $billing) }}" class="btn btn-sm btn-info">View</a>
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
