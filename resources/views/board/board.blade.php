@extends('layout')

@section('title', 'Board')

@section('main')

<div class="row">
  <div  class="col-sm-6">
    <h2>Forum</h2>
  </div>
  <!-- .row -->
</div>

<div class="col-12  m-4 text-right">
	Showing <span id="num-results" class="font-weight-bold">{{$comments->count()}}</span> result(s).
</div>
<table class="table table-responsive col-12 mt-3 table-hover text-center">
	<thead>
		<tr>
      <th class="col-sm-1 text-center">#</th>
      <th class="col-sm-4 text-center">Title</th>
      <th class="col-sm-2 text-center">Username</th>
      <th class="col-sm-2 text-center">Update</th>
      <th class="col-sm-1 text-center"></th>
		</tr>
	</thead>
	<tbody>
    @forelse($comments as $indexKey => $comment)
		<tr>
			<td>{{$indexKey+1}}</td>
			<td><a href="/board/detail/{{$comment->comment_id}}">{{$comment->title}}</a></td>
			<td>{{$comment->student()->get()->first()->name}}</td>
			<td>{{$comment->timestamp}}</td>
      <td>
        @if(Auth::check())
          @if(Auth::user()->student_id == $comment->student_id)
            <a class="btn btn-warning btn-sm" href="/board/{{$comment->comment_id}}">Delete</a>
          @endif
        @endif
      </td>
		</tr>
    @empty
    <tr>
      No lists
    </tr>
    @endforelse
	</tbody>
</table>
@if(Auth::check())
  <a class="btn btn-primary btn-sm pull-right" href="/board/new" role="button">Add</a>
@else
  <p class="text-center"> *Please login to add story</p>
@endif

@endsection
