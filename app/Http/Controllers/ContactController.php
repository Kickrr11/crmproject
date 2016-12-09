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
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store (Request $request) {
        
        $v = Validator::make($request->all(), [
            
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email'
            
            		
            ]);
		
	if ($v->fails()) {
            
            return Redirect::back()->witherrors($v);
			
            $errors = $v->errors();

            
			
	}
		
	else  {
			
           $contact= Contact::create(array (
               
            'firstname'=>$request->input('firstname'),
            'lastname'=>$request->input('lastname'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
            'skype'=>$request->input('skype'),
            'company'=>$request->input('company')

           ));
               
           

	}
        $accounts=array(Input::get('accountid'));
        
        
        foreach ($accounts as $accountId) {
            
           $account = Account::find($accountId);
           $contact->account()->associate($account);
           
        }
        
        $user = Auth::user();
        $contact->user()->associate($user);
        
        
        $contact->save();
 
    }
    
    public function show ($id=null) {
        
        $contact = Contact::find($id);
        
        return View::make ('contactview')
                ->with ('contact',$contact);
        
    }
    
    public function edit ($id) {
        
        $contact = Contact::find($id);
         return View::make ('contactedit')->with('contact',$contact); 
        
    }
    
    
    public function update (Request $request,$id=null) {
     
        $id = $request->input('id');
        
        $contact= Contact::find($id);
 
        if($contact){
            
            $contact->firstname    = $request->input('firstname');
            $contact->lastname  = $request->input('lastname');
 
            if($contact->save()){
               return redirect('accounts')->with('status', 'Contact updated!');
            }else{
               return array('status'=>'Could not update!');
            }
        }
        return array('status'=>'Could not find Account!');

    }
    
    
    public function destroy(Request $request,$id=null) {
        
        $id = $request->input('contactid');
        $remove =Contact::find($id);
        $remove->delete();
        
        if($remove) {
            
           return redirect('accounts')->with('status', 'Contact deleted!');
            
            
        }
        
        else {
            
            return array('status'=>'Could not update!');
            
        }
        
    }
}
