<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings = Booking::latest()->get();
        $packages = Package::all();
        return view('admin.dashboard', compact('bookings', 'packages'));
    }
}
 