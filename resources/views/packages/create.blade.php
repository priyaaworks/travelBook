@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset('images/' . $package->image) }}" class="img-fluid rounded-start" alt="{{ $package->title }}">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="card-title">{{ $package->title }}</h2>
                    <p><strong>Destination:</strong> {{ $package->destination }}</p>
                    <p><strong>Price per Person:</strong> ₹{{ $package->price }}</p>
                    <p>{{ $package->description }}</p>

                    <hr>

                    <h4 class="mb-3">Book Your Trip</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $package->id }}">

                        <div class="mb-3">
                            <label for="booking_date" class="form-label">Booking Date</label>
                            <input type="date" id="booking_date" name="booking_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_of_people" class="form-label">Number of People</label>
                            <input type="number" id="no_of_people" name="no_of_people" class="form-control" min="1" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
                    </form>

                    <a href="{{ url('/') }}" class="btn btn-link mt-3">← Back to Packages</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
