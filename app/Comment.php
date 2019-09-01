<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/campgrounds/{$this->campground->id}/comments/{$this->id}";
    }
}
