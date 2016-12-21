<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Auth;
use Session;
use App\User;
use App\Contact;
use Illuminate\Http\Request;
use repositories\UserRepoInterface;

class UserController extends Controller
{
    
    public function __construct(UserRepoInterface $user ) {
        
        $this->user=$user;
    }

    public function show ($id=null) {
        
        $user= $this->user->getbyId($id);
        
        return View::make ('userview')
                ->with ('user',$user);
        
    }
    


    public function edit ($id) {
        
        $user = $this->user->getbyId($id);
         return View::make ('useredit')->with('user',$user); 
         
    }

    public function update (Request $request,$id=null) {
     
        $id = $request->input('id');
        
        $user= User::find($id);
 
        if($user){
            
            $user->username    = $request->input('username');
            $user->email  = $request->input('email');
 
            if($user->save()){
               return redirect('users')->with('status', 'User updated!');
            }else{
               return array('status'=>'Could not update!');
            }
        }
        return array('status'=>'Could not find user!');

    }

}
