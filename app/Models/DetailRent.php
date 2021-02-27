<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRent extends Model
{
    use HasFactory;

    protected $fillable = [
        'duration',
        'room_id',
        'user_id',
    ];

    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function rooms()
    {
        $this->belongsTo(Room::class);
    }
}
