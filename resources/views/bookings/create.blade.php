
@extends('layouts.app')

@section('content')
<h1>Book: {{ $package->title }}</h1>
<form method="POST" action="/book">
    @csrf
    <input type="hidden" name="package_id" value="{{ $package->id }}">
    
    <label>Booking Date</label>
    <input type="date" name="booking_date" required>

    <label>No of People</label>
    <input type="number" name="no_of_people" required>

    <button type="submit">Book Now</button>
</form>
<br>

<!-- Payment Link -->
<a href="https://rzp.io/l/demo" target="_blank">
    <button>Proceed to Payment</button>
</a>
@endsection
 