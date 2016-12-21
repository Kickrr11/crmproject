<?php 

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Session;
use Illuminate\Http\RedirectResponse;
use repositories\AccountRepoInterface;

class AccountController extends Controller {
    
    public function __construct(AccountRepoInterface $account ) {
        
        $this->account=$account;
    }
    
    public function index() {
        
        $accounts = $this->account->selectAll();
        
        return View::make('accounts', ['accounts'=>$accounts]);
        
    }
    
    public function show ($id) {

        return View::make('accountsview')   
           ->with('contact', $this->account->getbyId($id)->contacts()->orderBy('created_at','desc')->paginate(4) )
           ->with('note', $this->account->getbyId($id)->notes()->orderBy('created_at','desc')->paginate(4) )
           ->with ('account', $this->account->getbyId($id)); 
    } 
    
    public function create($id=null) {

	return View::make ('newaccount')
	->with('title', 'New Account')
	->with('country', $this->account->create($id)->sortBy('name'));
    
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

           $input = $request->all();
           
           $this->account->store ($input);
 
        return redirect('accounts')->with('status', 'Account created!');

        }
        
			
    }
    
    public function edit ($id) {
        
        $account = $this->account->getbyId($id);
         return View::make ('accountedit')->with('account',$account); 
        
    }
    
    public function update (Request $request,$id=null) {
     
        $id = $request->input('id');
        
        $account= $this->account->getbyId($id);
 
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