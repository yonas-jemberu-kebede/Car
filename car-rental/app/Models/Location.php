<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;
    protected $guarded=[];

    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
