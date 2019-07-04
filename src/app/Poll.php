<?php

namespace App;

use Carbon\Carbon;
use RelativeTime\RelativeTime;
use Reliese\Database\Eloquent\Model as Eloquent;
use Str;

/**
 * Class Poll
 *
 * @property string $id
 * @property string $event_id
 * @property string $slug
 * @property string $title
 * @property string $text
 * @property string $expiration
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App
 */
class Poll extends Eloquent
{
    public $incrementing = false;

    protected $fillable = [
        'event_id',
        'title',
        'text',
        'expiration',
        'score',
    ];

    public function save(array $options = [])
    {
        if (empty($this->id)) {
            $this->id = Str::Uuid();
        }

        if (empty($this->slug)) {
            $this->setSlug($this->title);
        }

        parent::save($options);
    }

    public function setSlug(String $slug)
    {
        $this->slug = strtolower(preg_replace("/[^\w]+/", "", $slug));
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function votes()
    {
        $votes = [];
        $this->answers()->each(function (Answer $answer) {
            $votes[] = $answer->votes()->get();
        });

        return $votes;
    }

    public function isExpired()
    {
        return !is_null($this->expiration) && strtotime($this->expiration) < time();
    }

    public function remainingTime(): ?string
    {
        if ($this->isExpired()) {
            return null;
        }

        $relativeTime = new RelativeTime(['language' => '\RelativeTime\Languages\French']);
        return $this->expiration === null ? null : $relativeTime->timeLeft($this->expiration);
    }
}
