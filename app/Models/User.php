<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'id';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'id_card',
        'phone_number',
        'dob',
        'profile',
        'housenumber',
        'district',
        'commune',
        'street',
        'province',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = ['id_card' => null, 'phone_number' => null, 'dob' => null, 'profile' => 'default.svg'];

    public function maxUser()
    {
        return User::count();
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

}
