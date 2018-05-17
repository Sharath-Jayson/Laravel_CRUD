@extends('layouts.app')
	@section('content')
	<table>
		<tr>
			<th> No</th>
			<th> Name</th>
			<th> Email</th>
			<th> <a href="{{URL('users/create')}}">  +New </a></th>
		</tr>
		@foreach($users as $key=> $user)
		<tr>
			<td>{{$key+1}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td> <a href="{{URL('users/'.$user->id.'/edit')}}">Edit</a></td>
			<td> <form action="{{URL('users/'.$user->id)}}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" > Delete</button>
            </form>
            </td>
		</tr>
		@endforeach
	</table>
	@endsection