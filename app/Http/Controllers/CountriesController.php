<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Country;

class CountriesController extends Controller {
    
    public function index() {
        
        $countries = Country::paginate(10);
        
        return View::make('countries', ['countries'=>$countries]);
        
    }
    
    public function show ($id) {
        
        $country = Country::find($id);
                    
        return View::make('countriesview', ['country' => $country])
             ->with('account', Country::find($id)->account()->orderBy('created_at','desc')->paginate(10) ); 

    } 
    
    public function create() {

	return View::make ('newcountry');

    }
    

    public function store(Request $request){
        
        $v = Validator::make($request->all(), [
            
            'name' => 'required',
            'description' => 'required'
            		
            ]);
		
	if ($v->fails()) {
			
            return Redirect::back ()->withErrors($v);
		
	}
		
	else  {
			
           $country=Country::create(array (
               
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
 
           ));

	}

        $user = Auth::user();
        $country->user()->associate($user);
        $country->save();
        
        return redirect('countries')->with('status', 'Country created!');
		
    }
    
    
    public function edit ($id) {
        
        $country = Country::find($id);
         return View::make ('countryedit')->with('country',$country); 
        
    }
    
    public function update (Request $request,$id=null) {
     
        $id = $request->input('id');
        
        $country= Country::find($id);
 
        if($country){
            
            $country->name    = $request->input('name');
            $country->description  = $request->input('description');
 
            if($country->save()){
               return redirect('countries')->with('status', 'Country updated!');
            }else{
               return array('status'=>'Could not update!');
            }
        }
        return array('status'=>'Could not find Country!');

    }
    
    
    public function destroy(Request $request,$id=null) {
        
        $id = $request->input('countryid');
        $remove =Contact::find($id);
        $remove->delete();
        
        if($remove) {
            
           return redirect('countries')->with('status', 'Country deleted!');
            
            
        }
        
        else {
            
            return array('status'=>'Could not delete!');
            
        }
        
    }
    
    
}