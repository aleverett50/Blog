@extends('emails.app')

@section('content')

Hello {{ $user->name }},<br /><br />

Click here to reset your password: <a href="{{ url('password/reset/'.$token) }}">{{ url('password/reset/'.$token) }}</a>

@endsection