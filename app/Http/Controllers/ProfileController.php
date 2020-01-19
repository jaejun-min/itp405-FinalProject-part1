<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
    //
    public function index()
    {
      return view('admin/profile', [
        'user' => Auth::user() //current user
      ]);
    }
}
