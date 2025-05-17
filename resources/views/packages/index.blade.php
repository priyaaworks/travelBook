@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Travel Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Available Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <h1 class="text-center mb-4">Available Packages</h1>

    <div class="row">
        @foreach($packages as $package)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($package->image)
                <img src="{{ asset('images/' . $package->image) }}" class="card-img-top" alt="{{ $package->title }}">
                @else
                <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top" alt="No Image">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $package->title }}</h5>
                    <p class="card-text">Destination: {{ $package->destination }}</p>
                    <p class="card-text">Price: ₹{{ number_format($package->price) }}</p>
                    <a href="/package/{{ $package->id }}" class="btn btn-primary mt-auto">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection

