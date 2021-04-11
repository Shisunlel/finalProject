<?php

namespace App\Providers;

use App\Models\DetailRent;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-room', function (User $user, Room $room) {
            return $user->id === $room->user_id;
        });

        Gate::define('user-reviews', function (User $user, Review $review) {
            return $user->id === $review->user_id;
        });

        Gate::define('user-reserved', function (User $user, Room $room) {
            $detail = DetailRent::join('rooms', 'room_id', 'rooms.id')->join('rents', 'rent_id', 'rents.id')->where('rooms.id', $room->id)->get();
            return $detail->contains('user_id', $user->id);
        });
    }
}
