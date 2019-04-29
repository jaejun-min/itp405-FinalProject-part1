@extends('layout')

@section('title', 'Profile')

@section('main')
  @if (Auth::check())
    @if($user->student_id)
        <h3>Profile</h3>
          <p> If you want to edit your profile, please click <a href="/profile/{{$student->student_id}}/edit">Edit Profile</a></p>
          <div class="row well well-sm">
            <div class="col-md-4"><b>Name : </b></div>
            <div class="col-md-8">{{$student->name}}</div>
          </div>
          <div class="row  well well-sm">
            <div class="col-md-4"><b>Email : </b></div>
            <div class="col-md-8">{{$user->email}}</div>
          </div>
          <div class="row  well well-sm">
            <div class="col-md-4"><b>Grad Year : </b></div>
            <div class="col-md-8">{{$student->grad_year}}</div>
          </div>
          <div class="row  well well-sm">
            <div class="col-md-4"><b>College : </b></div>
            <div class="col-md-8">{{$college->name}}</div>
          </div>
          <div class="row  well well-sm">
            <div class="col-md-4"><b>Major: </b></div>
            <div class="col-md-8">{{$major->name}}</div>
          </div>
          <hr>
          <div class="row  well well-sm">
            <h4>About Me</h4>
            <hr>
            <p>{{$student->intro}} </p>
          </div>
    @else
      <p> Profile is not added. Please add your profile.<a href="/profile/new">Create Profile</a></p>
    @endif
  @else
    <p> Need to login first.</p>
  @endif
@endsection
