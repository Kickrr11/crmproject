<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;

class Contact extends Model
{
    protected $table='contacts';
    protected $fillable = [
        'firstname', 'lastname','email','skype','phone','company'
    ];


    public function account () {
        
        return $this->belongsTo('App\Account');
        
    }
    
    public function user () {
        
        return $this->belongsTo('App\User');
        
    }
}
