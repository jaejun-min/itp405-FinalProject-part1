@extends('layout')

@section('title', 'Sign Up')

@section('main')
  <h1>Sign Up</h1>
  <p>Already have an account? Please <a href="/">Login</a></p>
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
      <small class="text-danger">{{$errors->first('email')}}</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <label for="password_confirmation">Password Confirmation</label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
      <small class="text-danger">{{$errors->first('password')}}</small>
    </div>
    <input type="submit" value="Sign Up" class="btn btn-primary">
  </form>
@endsection
