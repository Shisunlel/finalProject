<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'facility',
    ];

    public function rooms()
    {
        $this->belongsToMany(Room::class, 'room_facilities', 'facility_id', 'room_id');
    }
}
