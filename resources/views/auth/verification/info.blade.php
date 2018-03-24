@extends('layouts.master')
@section('title', 'Verify account')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <h1>Please verify your account</h1>
                <p>Before you can continue, your user account needs to be verified.</p>
                <p>A verification e-mail message is sent to <b>{{ Auth::user()->email }}.</b></p>
                <br />
                <p>If you cannot find it, send a new verification e-mail message by clicking the button below.</p>
                @include('auth.verification.resend-button')
            </div>
        </div>
    </div>
@endsection
