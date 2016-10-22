@extends('layouts.noauth')

@section('title', 'Reset Password')
@section('content')

    @if (session('status'))
        {{ session('status') }}
    @endif
    <form method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}
        <div>
            <b>Reset Password</b>
        </div>
        <div>
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required/>
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div>
            <button type="submit">
                Send Password Reset Link
            </button>
        </div>
    </form>

@endsection