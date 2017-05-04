<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Credential
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property bool $type
 * @property string $name
 * @property string $hostname
 * @property string $username
 * @property string $password
 * @property int $port
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereHostname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential wherePort($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereProjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Credential whereUsername($value)
 * @mixin \Eloquent
 */
class Credential extends Model {
	protected $fillable = [
        'user_id',
        'project_id',
        'name',
        'type',
        'hostname',
        'username',
        'password',
        'port'
    ];

    protected $hidden = ['created_at','updated_at'];
}