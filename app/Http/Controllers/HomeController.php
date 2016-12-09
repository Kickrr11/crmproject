<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Auth;
use Session;
use App\User;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller {
    
    public function hello() {
        
    $users = User::all();
    $latestActivities = Activity::with('user')->latest()->limit(20)->get();    
    
        return View::make('dashboard')->with('latestactivity',$latestActivities);   

}

}