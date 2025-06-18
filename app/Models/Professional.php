<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
     protected $fillable = [
    'name', 'email', 'password', 'phone', 'cin', 'city', 'specialty',
    'bio', 'years_experience', 'service_area', 'hourly_rate',
    'rating', 'review_count', 'availability', 'certifications',
    'insurance_provider', 'policy_number', 'profile_photo_path',
];

    protected $casts = [
        'availability' => 'array',
        'certifications' => 'array',
        'hourly_rate' => 'decimal:2',
        'rating' => 'decimal:1',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Helper methods
    public function getFormattedRateAttribute()
    {
        return '$' . number_format($this->hourly_rate, 2) . '/hr';
    }

    public function getAvailableDaysAttribute()
    {
        return is_array($this->availability) 
            ? implode(', ', $this->availability)
            : 'Not specified';
    }

    public function scopeWithSpecialty($query, $specialty)
    {
        return $query->where('specialty', $specialty);
    }

    public function scopeInArea($query, $area)
    {
        return $query->where('service_area', 'like', "%{$area}%");
    }

    public function scopeAvailableOn($query, $day)
    {
        return $query->whereJsonContains('availability', $day);
    }

    public function scopeHighlyRated($query, $minRating = 4)
    {
        return $query->where('rating', '>=', $minRating)
                    ->orderBy('rating', 'desc');
    }
}
