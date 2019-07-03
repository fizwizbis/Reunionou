<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    protected $guarded = [];
    public $incrementing = false;

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'users_events', 'event_id', 'user_id');
    }

    public function isSubscribed($user_id = null): bool
    {
        if (is_null($user_id)) {
            return $this->belongsToMany(User::class, 'users_events', 'event_id', 'user_id')->where('user_id', '=', Auth::user()->id)->count();
        }
        return $this->belongsToMany(User::class, 'users_events', 'event_id', 'user_id')->where('user_id', '=', $user_id)->count();
    }

    public function isAuthor(): bool
    {
        return $this->author == Auth::user()->id;
    }
}
