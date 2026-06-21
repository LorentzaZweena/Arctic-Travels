<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resort extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'name',
        'country',
        'description',
        'image',
        'price'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}