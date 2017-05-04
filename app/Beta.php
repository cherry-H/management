<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Beta
 *
 * @property int $id
 * @property string $email
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Beta whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Beta whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Beta whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Beta whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Beta whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Beta extends Model {
	protected $fillable = [];
	protected $table    = 'beta';

	
}