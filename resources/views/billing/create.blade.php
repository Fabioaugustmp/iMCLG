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
                                <h3 class="mb-0">Add Billing</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('billing.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="property_id">Property</label>
                                <select class="form-control" id="property_id" name="property_id" required>
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->id }}">{{ $property->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="value">Amount</label>
                                <input type="number" class="form-control" id="value" name="value" step="0.01" required>
                            </div>

                            <div class="form-group">
                                <label for="expiration_date">Expiration Date</label>
                                <input type="date" class="form-control" id="expiration_date" name="expiration_date" required>
                            </div>

                            <div class="form-group">
                                <label for="payment_status">Payment Status</label>
                                <select class="form-control" id="payment_status" name="payment_status" required>
                                    <option value="unpaid">Unpaid</option>
                                    <option value="paid">Paid</option>
                                    <option value="overdue">Overdue</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pdf">PDF</label>
                                <input type="file" class="form-control-file" id="pdf" name="pdf" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Billing</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
