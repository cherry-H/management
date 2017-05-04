<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * App\Project
 *
 * @property int $id
 * @property int $user_id
 * @property int $client_id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $production
 * @property string $stage
 * @property string $dev
 * @property string $github
 * @property-read \App\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Credential[] $credentials
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $members
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Task[] $tasks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereClientId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereDev($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereGithub($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereProduction($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereStage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Project whereUserId($value)
 * @mixin \Eloquent
 */
class Project extends Model {
	protected $fillable = [
			'user_id',
			'client_id',
			'name',
			'description',
			'production',
			'stage',
			'dev',
			'github'
		];
	protected $hidden = [
			'created_at',
			'updated_at'
	];

	public function tasks(){
		return $this->hasMany('App\Task', 'project_id');
	}

	public function credentials(){
		return $this->hasMany('App\Credential', 'project_id');
	}

	public function members(){
		return $this->belongsToMany('App\User');
	}

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function uploads(){
        return $this->hasMany('App\Upload', 'project_id');
    }

	/**
	 * Checks if teh currently Auth user
	 * is the owner of the project.
	 *
	 * @return bool
	 */
	public function isOwner(){
		if($this->user_id != Auth::id()){
			return false;
		}

		return true;
	}


	/**
	 * Checks if the current Auth user
	 * is a member of a given project.
	 *
	 * @return bool
	 */
	public function isMember(){

		$s = DB::table('project_user')->whereProjectId($this->id)->whereUserId(Auth::id())->get();
		if(count($s) == 0){
			return false;
		}

		return true;
	}

	// Get the toal weight of the given project
	public function totalWeight(){
		return $this->tasks()->where('state','!=','complete')->sum('weight');
	}
}