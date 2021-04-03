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
    ];

    public function savedBy(User $user)
    {
        return $this->wishlists->contains('user_id', $user->id);
    }

    public function ownedBy(User $user)
    {
        return $this->user_id === $user->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rents()
    {
        return $this->belongsToMany(Rent::class)->withTimestamps();
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class)->withTimestamps();
    }
}
