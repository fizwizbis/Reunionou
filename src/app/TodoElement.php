<?php


namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TodoElement
 *
 * @property string $id
 * @property string $todo_id
 * @property string $user_id
 * @property string $description
 * @property bool $checked
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class TodoElement extends Eloquent
{
    public $incrementing = false;

    protected $casts = [
        'checked' => 'bool'
    ];

    protected $fillable = [
        'todo_id',
        'user_id',
        'description',
        'checked'
    ];

    public function checker(): string
    {
        if ($checker = User::find($this->user_id)) {
            return $checker->name;
        }
        return '';
    }
}
