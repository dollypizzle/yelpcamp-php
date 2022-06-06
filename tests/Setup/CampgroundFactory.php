<?php

namespace Tests\Setup;

use App\Campground;
use App\User;

class CampgroundFactory
{
    protected $user;

    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }
    public function create()
    {
        $campground = factory(Campground::class)->create([
            'owner_id' => $this->user ?? factory(User::class)
        ]);
        return $campground;
    }
}
