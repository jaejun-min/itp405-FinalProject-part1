<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use Hash;
use Validator;
use Auth;

class SignUpController extends Controller
{
  public function index()
  {
    return view('signup');
  }
  public function signup(Request $request)
  {
    $user = new User();
    $validation = Validator::make($request->all(), [
    'email' => 'required|unique:users,email',
    'password' => 'required|confirmed|min:6'
    ]);
    if($validation->fails()){
      return redirect('/')
        ->withInput()
        ->withErrors($validation);
    }
    $user->email = request('email');
    $user->password = Hash::make(request('password')); // bcrypt

    // $student = new Student();
    // $user->student_id = $student->student_id;
    $user->save();
    Auth::login($user);
    return redirect('/');


  }
}
