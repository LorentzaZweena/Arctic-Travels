<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 
        'resort_id', 
        'check_in', 
        'check_out', 
        'guest_count', 
        'total_price', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resort()
    {
        return $this->belongsTo(Resort::class);
    }
}
