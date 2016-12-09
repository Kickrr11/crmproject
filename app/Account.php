<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Country;
use App\Note;
use App\User;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;

class Account extends Model implements LogsActivityInterface{
    
    use LogsActivity;
    
    protected $table='account';
    protected $fillable = [
        'name', 'description','street','city', 'country','zip','phone'
    ];
    
    public function countries () {
        
        return $this->belongsTo('App\Country','country_id');
        
    }
 
    public function contacts() {
		
	return $this->hasMany ('App\Contact');
		
    }
    
    public function notes() {
		
	return $this->hasMany ('App\Note','account_id');
		
    }
    
   public function user() {
       
       return $this->belongsTo('App\User');
   }

    public function getActivityDescriptionForEvent($eventName) {
           
        
        if ($eventName == 'created')
    {
        return 'Account "' . $this->name . '" was created';
    }

    if ($eventName == 'updated')
    {
        return 'Account "' . $this->name . '" was updated';
    }

    if ($eventName == 'deleted')
    {
        return 'Account "' . $this->name . '" was deleted';
    }

    return '';
    }

}
