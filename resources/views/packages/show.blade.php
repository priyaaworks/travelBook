<!-- resources/views/packages/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $package->title }}</h1>
    <p><strong>Destination:</strong> {{ $package->destination }}</p>
    <p><strong>Price:</strong> ₹{{ $package->price }}</p>
    <p>{{ $package->description }}</p>
    <img src="{{ asset('images/' . $package->image) }}" alt="{{ $package->title }}" width="400">
    
    <br><br>
    <a href="{{ route('bookings.create', $package->id) }}" class="btn btn-primary">Book Now</a>
</div>
@endsection
