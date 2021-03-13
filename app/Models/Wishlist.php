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
        $this->belongsTo(User::class)->withTimestamps();
    }

    public function rooms()
    {
        $this->belongsTo(Room::class)->withTimestamps();
    }
}
