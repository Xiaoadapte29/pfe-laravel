<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'duration', 'is_available', 'category_id', 'professional_id'];

    protected $attributes = [
        'is_available' => true,
        'duration' => 60, 
    ];
    
    public function category() {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function professional() {
        return $this->belongsTo(User::class, 'professional_id');
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
