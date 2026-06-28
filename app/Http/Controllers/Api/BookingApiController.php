<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingApiController extends Controller
{
    public function myBookings()
    {
        $bookings = Booking::with('resort')
                            ->where('user_id', Auth::id())
                            ->latest()
                            ->get();

        return response()->json([
            'success' => true,
            'message' => 'My bookings were successfully retrieved',
            'data'    => $bookings
        ], 200);
    }
}
