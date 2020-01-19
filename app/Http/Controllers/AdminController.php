<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\College;
use App\Student;
use App\User;
use App\Major;
use Validator;

class AdminController extends Controller
{
    //
    public function index()
    {
      $userID = Auth::user()->student_id;
      if($userID){
        $student = Student::find($userID);
        $college = College::find($student->college_id);
        $major = Major::find($student->major_id);
        return view('admin/profile',[
          'user' => Auth::user(),
          'student' => $student,
          'college' => $college,
          'major' => $major
        ]);
      }
      else{
        return view('admin/profile', [
          'user' => Auth::user()
        ]);
      }

      // $majors = College::find($collegeId)->majors()->get()->pluck("name","major_id");
    }
    public function edit($student_id =null ){
      var_dump($student_id);
      if($student_id){
        $colleges = College::all();
        $student = Student::find($student_id);

          return view('admin.edit', [
            'colleges' => $colleges,
            'student' => $student,
            'init_college' => $student->college()->get()->first(),
            'init_major' => $student->major()->get()->first()
          ]);
      }
    }
    public function update(Request $request){
      $student = Student::find(request('studentId'));
      $validation = Validator::make($request->all(), [
      'name' => 'required',
      'grad_year' => 'required',
      'college' => 'required',
      'major' => 'required',
      'intro' => 'required|min:10'
      ]);
      if($validation->fails()){
        return back()->withErrors($validation)->withInput();
      }
      $student->name = request('name');
      $student->grad_year = request('grad_year');
      $student->college_id = request('college');
      $student->major_id = request('major');
      $student->intro = request('intro');
      $student->update();
      return redirect('/profile');
    }
    public function create()
    {
      $colleges = College::all();

      return view('admin.create', [
        'colleges' => $colleges,
      ]);
    }
    public function getMajorWithId($id)
    {
        $major_col = College::find($id)->majors()->get()->pluck("name","major_id");
        return response()->json(array($major_col), 200);

    }
    public function store(Request $request){
      $student = new Student();
      $validation = Validator::make($request->all(), [
      'name' => 'required',
      'grad_year' => 'required',
      'college' => 'required',
      'major' => 'required',
      'intro' => 'required|min:10'
      ]);
      if($validation->fails()){
        return back()->withErrors($validation)->withInput();
      }
      // $student->save();
      $user = Auth::user();
      if(!$user->student_id){
        $student->name = request('name');
        $student->grad_year = request('grad_year');
        $student->college_id = request('college');
        $student->major_id = request('major');
        $student->intro = request('intro');
        $student->save();
        // var_dump($student->student_id);
        $user->student_id = $student->student_id;
        $user->update();
      }
      return redirect('/profile');
    }
}
