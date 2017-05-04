<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Upload
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $name
 * @property string $path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Project $project
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Upload whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Upload whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Upload wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Upload whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Upload whereUserId($value)
 * @mixin \Eloquent
 */
class Upload extends Model {
	protected $fillable = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }

}