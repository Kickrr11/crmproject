<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Account;
use App\User;

class Country extends Model {
    
    protected $table='countries';
    protected $fillable = [
        'name', 'description'
    ];
    
    public function account(){
    
        return $this->hasMany('App\Account','country_id');
    }
    
    public function user () {
        
        return $this->belongsTo('App\User','user_id');
        
    }
}

