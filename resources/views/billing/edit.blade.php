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
                                <label for="payment_status">Payment Status</label>
                                <select class="form-control" id="payment_status" name="payment_status" required>
                                    <option value="unpaid" {{ $billing->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                    <option value="paid" {{ $billing->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="overdue" {{ $billing->payment_status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pdf">PDF</label>
                                <input type="file" class="form-control-file" id="pdf" name="pdf">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Billing</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
