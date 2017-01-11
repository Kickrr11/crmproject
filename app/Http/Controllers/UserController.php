<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
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
    


    public function edit ($id)
    {
        
        $user = $this->user->getbyId($id);
         return View::make ('useredit')->with('user',$user); 
         
    }

    public function update (Request $request,$id=null)
    {

        $file = $request->file('pic');
        $username=$request->input('username');
        $email=$request->input('email');
        if ($file) {
        
            $destinationPath= 'uploads';
                
            $filename = $file->move($destinationPath,$file->getClientOriginalName());
            $input = array('username'=>$username,'email'=>$email,'pic'=> $filename);
        
        } else {
 
            $input = $request->all();
            
        }

        if($this->user->update($id,$input))
        {
            
            return redirect()->route('users',$id)->with('status', 'User updated!');

        }
    }
        
  

    }


