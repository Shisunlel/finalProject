<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityRoom extends Model
{
    use HasFactory;

    protected $table = 'facility_room';

    protected $fillables = [
        'room_id',
        'facility_id',
    ];
}
