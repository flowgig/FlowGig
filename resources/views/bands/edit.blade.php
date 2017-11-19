@extends('layouts.master', ['currentBand' => $band])
@section('title', $band->name)
@section('navbar-title', $band->name)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Edit band", link: "{{ route('bands.edit', $band) }}"}
                        ]'>
                </breadcrumbs>
                <h1>{{ $band->name }}</h1>
                <form action="{{ route('bands.update', $band) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="name" id="name" value="{{ $band->name }}"
                                   placeholder="The Rolling Stones"/>
                            <label for="name">Band name</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <button type="submit" class="button button-flat button-primary">Update</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                @include('errors.validation-errors')
                @include('meta.user-timestamps', ['model' => $band])
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.index') }}">Back to band list</a>
                </div>
            </div>
        </div>
    </div>
@endsection