<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'address',
        'price',
        'qty',
        'guest',
        'available',
        'user_id',
    ];

    protected $attributes = [
        'available' => true,
    ];

    public function users()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reviews()
    {
        $this->hasMany(Review::class, 'room_id', 'id');
    }

    public function rent_details()
    {
        $this->hasMany(RentDetail::class, 'room_id', 'id');
    }

    public function images()
    {
        $this->hasMany(Image::class, 'room_id', 'id');
    }

    public function facilities()
    {
        $this->belongsToMany(Facility::class, 'room_facilities', 'room_id', 'facility_id');
    }
}
