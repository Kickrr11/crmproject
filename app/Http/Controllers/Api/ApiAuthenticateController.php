<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use repositories\UserRepoInterface;

class ApiAuthenticateController extends Controller
{
    
    public function __construct(UserRepoInterface $user )
    {
        $this->user = $user;
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }
    
    public function index()
    {
        return response()->json(['auth'=>Auth::user(), 'users'=>$this->user->selectAll()]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
    
    public function createRegistration(Request $request)
    {
        $password = $request->input('password');
        
        $input=array(
		
           'username'=>$request->input('username'),
            
           'password'=>bcrypt($password),

           'email'=>$request->input('email')	
        );
        
        $validator = Validator::make($input, array (
            
            'username' => 'required|unique:users',
            'password' => 'required|min:4',
            
            'email' => 'required|email|unique:users'
            
        ));
        
        if ($validator->fails()) {
            
            return response([
                'message'   => 'Validation Failed',
                'errors'        => $validator->errors()
            ]);

        }   else {

           $this->user->store ($input);

           return response()->json(['message' => 'Registration created, please login',
               'code' =>201],201 );
        }
    }
    
}