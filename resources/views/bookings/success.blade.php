@extends('layouts.app')

@section('content')
<style>
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
<div class="container text-center py-5">
    <div class="display-3 mb-3">🎉</div>

    <div class="card shadow-lg p-5 fade-in">
        <h1 class="text-success mb-4">
            <i class="bi bi-check-circle-fill"></i> Booking Confirmed!
        </h1>

        <p class="lead">Thank you for booking your trip with us, {{ Auth::user()->name }}!</p>

        <p>We've sent a confirmation email to <strong>{{ Auth::user()->email }}</strong>.</p>

        <a href="{{ url('/') }}" class="btn btn-primary mt-4">Explore More Packages</a>
    </div>
</div>
@endsection
