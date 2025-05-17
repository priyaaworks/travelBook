<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // 📌 Show the booking form for a package
    public function create($id)
    {
        $package = Package::findOrFail($id);
        return view('bookings.create', compact('package'));
    }

    // 📌 Handle form submission and store the booking
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'package_id'    => 'required|exists:packages,id',
            'booking_date'  => 'required|date',
            'no_of_people'  => 'required|integer|min:1',
        ]);

        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to book a package.');
        }

        // Create a new booking record
        $booking = Booking::create([
            'user_id'       => Auth::id(),
            'package_id'    => $request->package_id,
            'booking_date'  => $request->booking_date,
            'no_of_people'  => $request->no_of_people,
            'status'        => 'Pending',
        ]);

        // Send booking confirmation email
        Mail::to(Auth::user()->email)->send(new BookingConfirmed($booking));

        // Redirect to success page
        return redirect()->route('bookings.success');
    }

    // 📌 Show all bookings for admin
    public function index()
    {
        $bookings = DB::table('bookings')
            ->join('packages', 'bookings.package_id', '=', 'packages.id')
            ->leftJoin('users', 'bookings.user_id', '=', 'users.id')
            ->select(
                'bookings.*',
                'packages.title as package_title',
                'users.name as user_name',
                'users.email as user_email'
            )
            ->orderBy('bookings.id', 'desc')
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // 📌 Update booking status
    public function updateStatus(Request $request, $id)
    {
        // Validate status input
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        // Update the booking status
        DB::table('bookings')
            ->where('id', $id)
            ->update(['status' => $request->status]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated successfully!');
    }
      // 📌 Show bookings of currently logged-in user
    public function myBookings()
    {
        $bookings = Booking::with('package')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return view('bookings.my_bookings', compact('bookings'));
    }
}
