<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
class LoginController extends Controller
{
  public function index()
  {
    if(Auth::check()){
      return redirect('/profile');
    }else{
      return view('login');
    }
  }
  public function login(Request $request)
  {

    $validation = Validator::make($request->all(),[
      'email' => 'required|email|exists:users,email',
      'password' => 'required|min:6'
    ]);


    if ($validation->fails()) {
       return back()->withErrors($validation)->withInput();
   } else {
       $loginWasSuccessful = Auth::attempt([
         'email' => request('email'),
         'password' => request('password')
       ]);
       if ($loginWasSuccessful)
       {
         return redirect('/profile');
       }else{
         return redirect('/')
          ->withErrors([
            'password' => 'wrong password'
          ]);
       }
   }

  }
  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
}
