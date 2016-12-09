<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Auth;
use Session;
use App\Account;
use App\Note;
use App\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store (Request $request) {
        
        $v = Validator::make($request->all(), [
            
            'description' => 'required',
	
            ]);
		
	if ($v->fails()) {
			
            return Redirect::back()
                ->withErrors($v);
	
	}
		
	else  {
            
          
			
           $note= Note::create(array (
 
            'description'=>$request->input('description')

           ));
               
           

	}
        $accounts=array(Input::get('accountid'));
        
        
        foreach ($accounts as $accountId) {
            
           $account = Account::find($accountId);
           $note->account()->associate($account);
           
        }
        
        $user = Auth::user();
        $note->user()->associate($user);
        $note->save();
    }
    

    
    
}

