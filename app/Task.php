<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $name
 * @property string $state
 * @property string $weight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $description
 * @property string $due_date
 * @property string $priority
 * @property-read \App\Project $project
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereDueDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task wherePriority($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Task whereWeight($value)
 * @mixin \Eloquent
 */
class Task extends Model {
	protected $fillable = [
        'name',
        'weight',
        'user_id',
        'project_id',
        'state',
        'priority',
        'description'
    ];

    protected  $hidden = [
        "created_at",
        "updated_at",
    ];

    /**
     * Relationship to project
     */
    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}

