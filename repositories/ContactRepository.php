<?php 
namespace repositories;
use App\Account;
use App\Contact;
use Validator, Input, Redirect; 
use Auth;

class ContactRepository implements ContactRepoInterface {
	
    
    public function selectAll() {
       
        return Contact::paginate(10);
        
    }
    
    public function getbyId($id = null) {
        
        return Contact::find($id);
        
    }
    
    public function create ($id) {
        
       
        
    }
    
    public function store(array $data) {
        
        $contact = Contact::create($data);
        
        $accounts=array(Input::get('accountid'));
        
        
        foreach ($accounts as $accountId) {
            
           $account = Account::find($accountId);
           $contact->account()->associate($account);
           
        }
        
        $user = Auth::user();
        $contact->user()->associate($user);
        
        
        $contact->save();

    }
	

    public function edit($id = null) {
        
        return Contact::find($id);
        
    }




    public function update($id = null) {
        
    }
    
    public function destroy($id) {
        
        $contact= Contact::find($id);
        
        return $contact->delete();
        
    }


}