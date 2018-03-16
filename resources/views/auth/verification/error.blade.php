@extends('layouts.master')
@section('title', 'Verification error')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <h1>Verification failed</h1>
                <p>Something went wrong during verification of the account.</p>
                <p>Please click the button below to send a new verification e-mail message to <b>{{ Auth::user()->email }}.</b></p>
                @include('auth.verification.resend-button')
            </div>
        </div>
    </div>
@endsection
