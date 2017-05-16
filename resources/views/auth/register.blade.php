@extends('layouts.noauth')

@section('title', 'Register')
@section('content')
    <welcome-screen v-bind:form-type="'register'"
                    v-bind:form-data="{registerUrl: '{{ url('/register') }}' ,oldName: '{{ old('name') }}', oldEmail: '{{ old('email') }}' }">
    </welcome-screen>
@endsection
