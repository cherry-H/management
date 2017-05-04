<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Projectuser
 *
 * @property int $id
 * @property int $project_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Projectuser whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Projectuser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Projectuser whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Projectuser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Projectuser whereUserId($value)
 * @mixin \Eloquent
 */
class Projectuser extends Model {
	protected $fillable = [];
	protected $hidden = ['id','created_at', 'updated_at'];
	protected $table = 'project_user';

}