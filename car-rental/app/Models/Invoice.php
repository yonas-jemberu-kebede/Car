<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $guarded=[];

    public function booking(){
        return $this->belongsTo(Booking::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);}
}
