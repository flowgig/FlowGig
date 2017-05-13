@extends('layouts.noauth')
@section('title', 'Welcome')
@section('content')
    <welcome-screen v-bind:form-type="'welcome'"></welcome-screen>
@endsection
