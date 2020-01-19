@extends('layout')

@section('title', 'Add Contents')

@section('main')
  @if (Auth::check())
    <form method="post">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="name" name="title" class="form-control" value="{{old('title')}}">
        <small class="text-danger">{{$errors->first('title')}}</small>
      </div>
      <div class="form-group">
        <label for="content">Contents</label>
        <textarea class="form-control" id="content" name="content" value="{{old('content')}}" rows="5"></textarea>
        <small class="text-danger">{{$errors->first('content')}}</small>
      </div>
      <button type="sumbit" class="btn btn-primary">
        Save
      </button>
    </form>
  @else
    <p> Need to login first.</p>
  @endif
@endsection
