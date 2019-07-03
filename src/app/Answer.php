<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Answer
 * 
 * @property int $id
 * @property string $poll_id
 * @property string $text
 *
 * @package App
 */
class Answer extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'poll_id',
		'text'
	];

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
