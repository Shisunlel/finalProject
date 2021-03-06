<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function totalRent()
    {
        return Rent::count();
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'detail_rent', 'rent_id', 'room_id')->withTimestamps();
    }
}
