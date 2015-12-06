@extends('app')
@section('body')
	@foreach($data as $user)
		{{$user->username}}
	@endforeach
@endsection