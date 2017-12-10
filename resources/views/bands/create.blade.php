@extends('layouts.master')
@section('title', 'Create new band')
@section('navbar-title', 'Create band')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "Create new band", link: "{{ route('bands.create') }}"}
                        ]'>
                </breadcrumbs>
                <h1>Create new band</h1>
                <form action="{{ route('bands.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="The Rolling Stones"/>
                            <label for="name">Band name</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <button type="submit" class="button button-flat button-primary">Create</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                @include('errors.validation-errors')
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.index') }}">Back to band list</a>
                </div>
            </div>
        </div>
    </div>
@endsection