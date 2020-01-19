@extends('layout')

@section('title', 'Content')

@section('main')

    <div class="text-center"><h3>Title: {{$comment->title}}</h3></div> <hr>
    <div class="text-right"><b>Written by: {{$comment->student()->get()->first()->name}} | Updated at: {{$comment->timestamp}}</b></div>

    <hr>
    <div>
      <h4>Contents:</h4>
      <br>
      <p class="text-center">{{$comment->content}} </p>
    </div>
    <hr>
    <a href="/board" class="btn btn-primary btn-sm">
      Back
    </a>
@endsection
