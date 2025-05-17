<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookingController extends Controller
{
    // Show all bookings
    public function index()
    {
        $bookings = DB::table('bookings')
                    ->join('packages', 'bookings.package_id', '=', 'packages.id')
                    ->select('bookings.*', 'packages.name as package_name')
                    ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    // Update booking status
    public function updateStatus(Request $request, $id)
    {
        DB::table('bookings')->where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated!');
    }
}
