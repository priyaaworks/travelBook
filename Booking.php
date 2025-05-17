<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'booking_date',
        'no_of_people',
        'status',
    ];

    /**
     * 📌 Booking belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 📌 Booking belongs to a Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
