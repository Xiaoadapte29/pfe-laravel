<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'comment', 'booking_id'];

     public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
