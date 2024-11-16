<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMaintainance extends Model
{
    /** @use HasFactory<\Database\Factories\CarMaintainanceFactory> */
    use HasFactory;

    protected $guarded = [];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
