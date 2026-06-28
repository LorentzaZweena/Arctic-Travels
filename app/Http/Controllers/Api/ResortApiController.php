<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resort;
use Illuminate\Http\Request;

class ResortApiController extends Controller
{
    public function index()
    {
        $resorts = Resort::with('destination')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'The resort data list was successfully retrieved',
            'data'    => $resorts
        ], 200);
    }

    public function show($id)
    {
        $resort = Resort::with('destination')->find($id);
        if (!$resort) {
            return response()->json([
                'success' => false,
                'message' => 'No resort data found',
                'data'    => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Resort data details were successfully found',
            'data'    => $resort
        ], 200);
    }
}
