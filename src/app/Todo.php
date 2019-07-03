<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;
use Str;

/**
 * Class Todo
 *
 * @property string $id
 * @property string $event_id
 * @property string $name
 * @property \Carbon\Carbon $expiration
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Todo extends Eloquent
{
    public $incrementing = false;

    protected $dates = [
        'expiration',
    ];

    protected $fillable = [
        'event_id',
        'name',
        'expiration',
    ];

    public function save(array $options = [])
    {
        if (empty($this->id)) {
            $this->id = Str::Uuid();
        }
    }

    public function progress(): string
    {
        return
            $this->elements()->where('checked', 1)->count() .
            "/" . $this->elements()->count();
    }

    public function elements()
    {
        return $this->hasMany('App\TodoElement');
    }
}
