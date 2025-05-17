@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">My Bookings</h2>

    @if($bookings->count())
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Package</th>
                    <th>Booking Date</th>
                    <th>No. of People</th>
                    <th>Status</th>
                    <th>Amount (₹)</th>
                    <th>Booked On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->package->title }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->no_of_people }}</td>
                        <td>
                            <span class="badge 
                                @if($booking->status == 'Confirmed') bg-success 
                                @elseif($booking->status == 'Pending') bg-warning 
                                @else bg-danger 
                                @endif">
                                {{ $booking->status }}
                            </span>
                        </td>
                        <td>₹{{ $booking->package->price * $booking->no_of_people }}</td>
                        <td>{{ $booking->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">You haven't booked any trips yet.</div>
    @endif

    <a href="{{ route('packages.index') }}" class="btn btn-primary mt-3">Browse Packages</a>
</div>
@endsection
