@extends('layouts.app')
	@section('content')
	<form action="{{URL('users')}}{{ isset($user) ? '/'.$user->id :''}}" method="POST">
	  {{csrf_field()}}
	  @if(isset($user))
	  {{method_field('PUT')}}
	  @endif
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
		 <!-- <input type="hidden" name="_method" value="PUT"> -->
		 Name:<input name="name" value="{{isset($user) ? $user->name :''}}"><br>
		 Email:<input name="email" value="{{isset($user) ? $user->email :''}}"><br>
	   
		<button type="submit">add</button>
	</form>
	@endsection
