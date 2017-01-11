<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\View;
use Session;
use Spatie\Activitylog\Models\Activity;
use Torann\LaravelAsana\Asana;

class HomeController extends Controller
{
    
    public function hello()
    {

    $latestActivities = Activity::with('user')->latest()->limit(20)->paginate(5);    
    
        return View::make('dashboard')->with('latestactivity',$latestActivities);  

    }

}