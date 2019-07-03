<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Vote
 * 
 * @property string $poll_id
 * @property string $user_id
 * @property int $answer_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Vote extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'answer_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'answer_id'
	];
}
