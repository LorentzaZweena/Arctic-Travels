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

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $durationDays = $checkIn->diffInDays($checkOut);
        $totalPrice = $durationDays * $resort->price;

        Booking::create([
            'user_id'     => Auth::id(),
            'resort_id'   => $resort->id,
            'check_in'    => $request->check_in,
            'check_out'   => $request->check_out,
            'guests'      => $request->guests,
            'total_price' => $totalPrice,
            'status'      => 'pending',
        ]);

        return redirect()->route('landing')->with('success', 'Your booking has been submitted successfully! Please wait for confirmation from the admin.');
    }
}
