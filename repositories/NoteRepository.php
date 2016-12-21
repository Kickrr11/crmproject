<?php 
namespace repositories;
use App\Account;
use App\Note;
use Validator, Input, Redirect; 
use Auth;

class NoteRepository implements NoteRepoInterface {
	

    public function getbyId($id = null) {
        
        return Note::find($id);
        
    }
    
    public function create ($id) {
 
    }
    
    public function store(array $data) {

        $note = Note::create($data);
        
        $accounts=array(Input::get('accountid'));
        
        
        foreach ($accounts as $accountId) {
            
           $account = Account::find($accountId);
           $note->account()->associate($account);
           
        }
        
        $user = Auth::user();
        $note->user()->associate($user);
        
        
        $note->save();

    }
	

    public function edit($id = null) {
        
        return Note::find($id);
        
    }

    public function update($id = null) {
        
    }
    
    public function destroy($id) {
        
        $note= Note::find($id);
        
        return $note->delete();
        
    }


}