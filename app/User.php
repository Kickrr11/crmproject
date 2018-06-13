<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password', 'pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notes()
    {
        return $this->hasMany('App\Note', 'id');
    }

    public function account()
    {
        return $this->hasMany('App\Account', 'id');
    }

    public function country()
    {
        return $this->hasMany('App\Country', 'id');
    }
}
