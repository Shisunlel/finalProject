<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    use HasFactory;

    protected $table = 'item_list';

    protected $fillable = [
        'room_id',
        'wishlist_id',
    ];
}
