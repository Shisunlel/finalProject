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
        $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rents()
    {
        return $this->belongsToMany(Rent::class);
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
