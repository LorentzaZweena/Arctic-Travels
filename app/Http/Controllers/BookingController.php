<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request, $resort_id)
    {
        $request->validate([
            'check_in'    => 'required|date',
            'check_out'   => 'required|date|after:check_in',
            'guest_count' => 'required|integer|min:1',
        ]);
        $resort = Resort::findOrFail($resort_id);
        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $durationInNights = $checkIn->diffInDays($checkOut);
        if ($durationInNights == 0) {
            $durationInNights = 1;
        }
        $totalPrice = $resort->price * $durationInNights;
        Booking::create([
            'user_id'      => Auth::id(),
            'resort_id'    => $resort->id,
            'check_in'     => $request->check_in,
            'check_out'    => $request->check_out,
            'guest_count'  => $request->guest_count,
            'total_price'  => $totalPrice,
            'status'       => 'pending',
        ]);
        return redirect()->back()->with('success', 'Booking created successfully!');
    }

    public function adminIndex()
    {
        $bookings = Booking::with(['user', 'resort'])->latest()->get();
        
        return view('admin.booking', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:approved,canceled'
        ]);

        $booking->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'The booking status has been successfully updated!');
    }

    public function myBookings()
    {
        $bookings = Booking::with('resort')
                            ->where('user_id', Auth::id())
                            ->latest()
                            ->get();

        return view('customer.my-bookings', compact('bookings'));
    }
}
