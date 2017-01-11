<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Account;

class Note extends Model
{
    protected $table='notes';
    protected $fillable = [
        'name','description','doc'
    ];
    
    public function account () {
        
        return $this->belongsTo('App\Account');
        
    }
    
    public function user() {
        
        return $this->belongsTo('App\User');
        
    }
}
