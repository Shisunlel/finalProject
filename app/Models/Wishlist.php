<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
}
