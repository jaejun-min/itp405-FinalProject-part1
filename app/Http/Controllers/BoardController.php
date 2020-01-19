<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use App\Student;
use App\Comment;

class BoardController extends Controller
{
    public function index(){
      $comments = Comment::all();
      return view('board.board',[
        'comments' => $comments,
      ]);
    }

    public function create(){
      return view('board.create');
    }
    public function store(Request $request){
      $comment  = new Comment();

      $validation = Validator::make($request->all(), [
      'title' => 'required',
      'content' => 'required|min:20',
      ]);
      if($validation->fails()){
        return back()->withErrors($validation)->withInput();
      }else{
        $studentID = Auth::user()->student_id;
        $comment->title = request('title');
        $comment->content = request('content');
        $comment->student_id = $studentID;
        $comment->save();
      }
      return redirect('/board');
    }
    public function detail($commentId =null){
      $comment = Comment::find($commentId);
      return view('board.detail',[
        'comment' => $comment
      ]);
    }
    public function delete($commentId = null){
      // var_dump($commentId);
      if($commentId){
        $comment = Comment::find($commentId);
        if($comment){
           $comment->delete();
        }

        return redirect('/board');
      }
    }

}
