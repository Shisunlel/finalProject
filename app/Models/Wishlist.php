<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function rooms()
    {
        $this->belongsToMany(Room::class);
    }
}
