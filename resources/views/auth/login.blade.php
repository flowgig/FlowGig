@extends('layouts.noauth')

@section('title', 'Log in')
@section('content')
    <welcome-screen v-bind:form-type="'login'"
                    v-bind:form-data="{loginUrl: '{{ url('/login') }}', resetUrl: '{{ url('/password/reset') }}', oldEmail: '{{ old('email') }}' }">
    </welcome-screen>
@endsection