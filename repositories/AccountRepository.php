<?php 
namespace repositories;
use App\Account;
use App\Country;
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
        var_dump ($user);
        $account->user()->associate($user);
        $account->save();

        
       
        
    }
	

    public function edit($id = null) {
        
        return Account::find($id);
        
    }




    public function update($id = null) {
        

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


}