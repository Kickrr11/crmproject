<?php 

namespace repositories;

use App\Account;
use App\Country;
use App\Contact;
use App\Note;
use Validator, Input, Redirect; 
use Auth;

class AccountRepository implements AccountRepoInterface {

    public function selectAll() {
       
        return Account::paginate(10);
        
    }
    
    public function getbyId($id = null) {
        
        return Account::find($id);
        
    }
    
    public function create ($id) {
        
       return  Country::all();
        
    }
    
    public function store(array $data) {
        
        $account = Account::create($data);
        
        $countries=array(Input::get('country_id'));
       
        
        foreach ($countries as $countryId) {
            
           $country = Country::find($countryId);
           $account->countries()->associate($country);
           
        }
        $user = Auth::user();
        
        $account->user()->associate($user);
        $account->save();

    }
	

    public function edit($id = null) {
        
        return Account::find($id);
        
    }

    public function update($id = null,array $data) {

        $account = Account::find($id);
        
        return $account->fill($data)->save();
    }
    
    public function destroy($id) {
        
        $account= Account::find($id);
        
        return $account->delete();
        
    }
    
    public function contacts ($id) {
        
        $account= Account::find($id);
        
        return $account->contacts()->orderBy('created_at','desc')->paginate(4);
        
    }

    
    public function notes ($id) {
        
        $account= Account::find($id);
        
        return $account->notes()->orderBy('created_at','desc')->paginate(4);
        
    }
    //API method
    public function shownotes ($accountId,$noteId) {
        
        $account= Account::find($accountId);
        $note= Note::find($noteId);
        
        $accounts= $account->notes()->get()->find($note);
        
        return $accounts;
        
    }
    
    //API method returns contact for account fractal

    public function accCont($id) {
        
        $account= Account::find($id);
        
        return $account;
        
    }
    //API method returns note for account fractal  
    
    public function accNote($id) {
        
        $account= Account::find($id);
        
        return $account;
        
    }
    
    //API method returns contact for account fractal
    
    //API method
    public function showContacts ($accountId,$contactId) {
        
        $account= Account::find($accountId);
        $contact= Contact::find($contactId);
        
        $accounts= $account->contacts()->get()->find($contact);
        
        return $accounts;
        
    }
    // method for returning all accounts with contacts for 
    /*
    public function apiAccountContacts($id) {
        $account = Account::find($id);
        return $account::with('contacts')->get(); 
    }
    */

    public function search($query) {
        
        return Account::search($query);
        
    }

}