@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>

<h2>All Bookings</h2>
@foreach($bookings as $booking)
    <p>{{ $booking->id }} | Package: {{ $booking->package->title }} | Status: {{ $booking->status }}</p>
@endforeach
@endsection
