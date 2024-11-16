<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    protected $guarded = [];

    public function carMaintainances(){
      return $this->hasMany(CarMaintainance::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
}
