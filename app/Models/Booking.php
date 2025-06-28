<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['status', 'scheduled_at', 'scheduled_end_time', 'notes', 'cancellation_reason', 'client_id', 'service_id'];
 protected $casts = [
        'scheduled_at' => 'datetime',
        'scheduled_end_time' => 'datetime',
    ];
    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }
}

