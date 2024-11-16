<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $guarded = [];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
