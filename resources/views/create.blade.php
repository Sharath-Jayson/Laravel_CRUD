@extends('layouts.app')
@section('contents')
<form action="{{URL('users')}}" method="POST">
<input type="hidden" name="_token" value="{{csrf_token() }}">
<input type="name"><br>
<input type="email"><br>
<button type="submit">Add</button>
</form>
@endsection