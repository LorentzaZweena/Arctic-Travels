<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request, Resort $resort)
    {
        $request->validate([
            'check_in'  => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests'    => 'required|integer|min:1',
        ]);

        $checkIn = \Carbon\Carbon::parse($request->check_in);
        $checkOut = \Carbon\Carbon::parse($request->check_out);
        $durationDays = $checkIn->diffInDays($checkOut);
        
        $totalPrice = $durationDays * $resort->price;
        $booking = new Booking();
        $booking->user_id = \Illuminate\Support\Facades\Auth::id();
        $booking->resort_id = $resort->id;
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;
        $booking->guest_count = $request->guests;
        $booking->total_price = $totalPrice;
        $booking->status = 'pending';
        $booking->save();

        return redirect()->route('landing')->with('success', 'Your booking has been successfully submitted!');
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

        return redirect()->back()->with('success', 'Status booking berhasil diperbarui!');
    }
}
