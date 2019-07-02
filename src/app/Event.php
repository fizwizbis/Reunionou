<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'users_events', 'event_id', 'user_id');
    }
}
