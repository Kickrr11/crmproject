<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Auth;
use Session;
use App\Account;
use App\Country;
use App\Note;
use Illuminate\Http\RedirectResponse;


class AccountController extends Controller {
    
    public function index() {
        
        $accounts = Account::paginate(10);
        
        return View::make('accounts', ['accounts'=>$accounts]);
        
    }
    
    public function show ($id) {
        
        $account = Account::find($id);
        
         return View::make('accountsview')   
            ->with('contact', Account::find($id)->contacts()->orderBy('created_at','desc')->paginate(4) )
            ->with('note', Account::find($id)->notes()->orderBy('created_at','desc')->paginate(4) )
            ->with ('account', Account::find($id));
         /*          
        return View::make('accountsview', ['account' => $account]); 
  */      
 
    } 
    
    public function create($id=null) {
        
        $country= Country::find($id);
	return View::make ('newaccount')
	->with('title', 'New Issue')
	->with('country', Country::All()->sortBy('name'));
    
       
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
			
           $account=Account::create(array (
               
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'street'=>$request->input('street'),
            'city'=>$request->input('city'),
            'country'=>$request->input('country'),
            'zip'=>$request->input('zip'),
            'phone'=>$request->input('phone'),

           ));

	}
        $countries=array(Input::get('country_id'));
        
        
        foreach ($countries as $countryId) {
            
           $country = Country::find($countryId);
           $account->country()->associate($country);
           
        }
        $user = Auth::user();
        $account->user()->associate($user);
        $account->save();
        
        return redirect('accounts')->with('status', 'Account created!');

        
        
			
    }
    
    public function edit ($id) {
        
        $account = Account::find($id);
         return View::make ('accountedit')->with('account',$account); 
        
    }
    
    public function update (Request $request,$id=null) {
     
        $id = $request->input('id');
        
        $account= Account::find($id);
 
        if($account){
            
            $account->name    = $request->input('name');
            $account->description  = $request->input('description');
 
            if($account->save()){
               return redirect('accounts')->with('status', 'Account updated!');
            }else{
               return array('status'=>'Could not update!');
            }
        }
        return array('status'=>'Could not find Account!');

    }
}