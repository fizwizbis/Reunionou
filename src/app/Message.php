<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @var array */
    protected $fillable = [
        'body', 'event_id',
    ];
    /** @var array */
    protected $appends = [
        'selfMessage',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getSelfMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }
}
