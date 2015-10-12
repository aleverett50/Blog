@extends('emails.app')

@section('content')

Hello {{ $data['first_name'] }}, <br /><br />

Thanks for creating an account.

<br /><br />Please follow the link below to verify your email address <a href="{{ url('verify/' . $activation_code) }}">{{ url('verify/' . $activation_code) }}</a>

@endsection