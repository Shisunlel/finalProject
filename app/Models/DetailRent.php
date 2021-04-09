<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRent extends Model
{
    use HasFactory;

    protected $primaryKey = 'rent_id';

    protected $table = 'detail_rent';

    protected $fillable = [
        'duration',
        'room_id',
        'rent_id',
        'total',
        'cost',
        'province',
        'district',
        'commune',
        'street',
        'housenumber',
    ];
}
