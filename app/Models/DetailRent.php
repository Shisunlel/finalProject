<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRent extends Model
{
    use HasFactory;

    protected $table = 'detail_rent';

    protected $fillable = [
        'duration',
        'room_id',
        'user_id',
    ];
}
