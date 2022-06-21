<?php


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property string $second_last_name
 * @property int $active
 * @property string|null $remember_token
 * @property int $fk_id_role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereFkIdRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSecondLastName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Credit[] $credits
 * @property-read int|null $credits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Assignment[] $assignments
 * @property-read int|null $assignments_count
 * @property-read mixed $full_name
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'user';
    protected $fillable = [
        'username' ,
        'name',
        'last_name',
        'second_last_name',
        'fk_id_role'
    ];

    protected $appends = [
        'full_name',

    ];

    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'fk_id_role'
        );
    }

    public function clients()
    {
        return $this->hasMany(
            Client::class,
            'fk_id_user'
        );
    }

    public function comments()
    {
        return $this->hasMany(
            Comment::class,
            'fk_id_user'
        );
    }

    public function assignments()
    {
        return $this->hasMany(
            Assignment::class,
            'fk_id_user'
        );
    }

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->last_name.' '.$this->second_last_name;
    }
}
