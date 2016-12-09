<?php 


namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use Illuminate\Support\Facades\View;
use Validator, Input, Redirect; 
use Illuminate\Support\MessageBag;
use Session;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    
    public function login() {
        
        
        return View::make('login');
        
    }
    
    public function doLogout(){
        
        Auth::logout(); // logging out user
            return Redirect::to('login'); // redirection to login screen
	
		
		
    }
    
    public function logged () {
        
        $data=Input::all();
        
        $rules= array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:4'
        
        ); 
        
        $validator = Validator::make ($data, $rules);
        
        if ($validator->fails()) {
            
            return Redirect::to ('/login' )->withErrors($validator)
                ->withInput (Input::except ('password'));
            
        }
        
        
        
        else {
            
            $userdata=array('email' => Input::get('email'),
            'password' => Input::get('password'));  

        }
        
        if (Auth::validate($userdata)) {
            if (Auth::attempt($userdata)) {
                return Redirect::to ('/dashboard' );
            }
        } 
        else {
          
          
        // if any error send back with message.
            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
        
            return Redirect::back()
                    ->withErrors($errors)
                    ->withInput(Input::except('password'));
       
            
            Session::flash('error', 'Username or password doesnt match'); 
            return Redirect::to('login');
          
        }
      
        
    }
    
    public function registration () {
        
        return View::make('registration');
        
    }
    
    public function createRegistration() {
        
        $input=array(
		
            'name'=>Input::get('username'),
            
            /*do hash password */
            'password'=>Input::get('password'),
            'email'=>Input::get('email')
	
        );
        
        $validator = Validator::make($input, array (
            
            'name' => 'required|unique:users',
            'password' => 'required|min:3',
            
            'email' => 'required|email|unique:users'
            
        ));
        
        if ($validator->fails()) {
            
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
            
            
        }
        
        else {
            
            User::create(array (
                
                'name' => Input::get ('username'),
                'password'=>Input::get ('password'),
                'email'=>Input::get ('email')
 
            )); 
            
            
            
            return Redirect::to('/login');
            /*
                ->with('global','You successfully created a 
                new account an email has been sent to verify your account');
        
             * 
             * 	
             */
        }
    }
  
}
