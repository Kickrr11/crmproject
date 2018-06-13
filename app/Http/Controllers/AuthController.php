<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Input;
use Redirect;
use repositories\UserRepoInterface;
use Validator;

class AuthController extends Controller
{
    private $user;

    public function __construct(UserRepoInterface $user)
    {
        $this->user = $user;
    }

    public function login()
    {
        return View::make('login');
    }

    public function doLogout()
    {
        Auth::logout(); // logging out user

        return Redirect::to('login'); // redirection to login screen
    }

    public function logged()
    {
        $data = Input::all();

        $rules = [
            'email'    => 'required|email',
            'password' => 'required|min:4',

        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::to('/login')->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userdata = ['email' => Input::get('email'),
            'password'           => Input::get('password'), ];
        }

        if (Auth::validate($userdata)) {
            if (Auth::attempt($userdata)) {
                return Redirect::to('/dashboard');
            }
        } else {

        // if any error send back with message.
            $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);

            return Redirect::back()
                    ->withErrors($errors)
                    ->withInput(Input::except('password'));

            return Redirect::to('login');
        }
    }

    public function registration()
    {
        return View::make('registration');
    }

    public function createRegistration(Request $request)
    {
        $password = $request->input('password');

        $input = [

           'username'=> $request->input('username'),

            /*do hash password */

           'password'=> bcrypt($password),

           'email'=> $request->input('email'),

        ];

        $validator = Validator::make($input, [

            'username' => 'required|unique:users',
            'password' => 'required|min:4',

            'email' => 'required|email|unique:users',

        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $this->user->store($input);

            return Redirect::to('/login');
        }
    }
}
