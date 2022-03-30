<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function create(Request  $request){
       $request->validate([
           'fname' => ['required', 'string', 'max:255'],
           'lname' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' =>['required'],
           'address'=>['required'],
           'city'=>['required'],
           'state'=>['required'],
           'country'=>['required'],
       ]);

         $user=User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
        ]);
         return redirect()->route('dash',compact('user'));
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $email=$request->email;
        $password=$request->password;


        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dash');
        }

    }

     public function logout(Request $request) {
            Auth::logout();
            return redirect('/login');
     }

}
