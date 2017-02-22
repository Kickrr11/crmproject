<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\View;
use Session;
use Spatie\Activitylog\Models\Activity;
use Torann\LaravelAsana\Asana;
use App\Account;
use DB;

class HomeController extends Controller
{
    
    public function hello()
    {

    $latestActivities = Activity::with('user')->latest()->limit(20)->paginate(5);    
    
        return View::make('dashboard')->with('latestactivity',$latestActivities);  

    }
    
    public function charts() {
        
        
        $accounts = DB::table('account')
            ->select(DB::raw('MONTHNAME(updated_at) as month'), DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"),
                    DB::raw('count(*) as account'))
            ->groupBy('monthNum')
            ->get();
        
        return View::make('chartstest')->with('accounts',$accounts);   
        
    }

}