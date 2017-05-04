<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Client
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $phone_number
 * @property string $point_of_contact
 * @property string $email
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client wherePhoneNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client wherePointOfContact($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Client whereUserId($value)
 * @mixin \Eloquent
 */
class Client extends Model {

	protected $table = 'clients';
	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
		'user_id',
		'name',
		'phone_number',
		'point_of_contact',
		'email'
	];

	/**
	 * Return the related projects for a given client
	 */
	public function projects() {
        return $this->hasMany('App\Project', 'client_id');
    }
}