@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Create new song')
@section('navbar-title', 'Create song')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Songs", link: "{{ route('songs.index', $band) }}"},
                        {name: "Create new song", link: "{{ route('songs.create', $band) }}"}
                        ]'>
                </breadcrumbs>
                <h1>Create new song</h1>
                <edit-song v-bind:form-data="{registerUrl: '{{ route('songs.store', $band) }}'}"></edit-song>
                @include('errors.validation-errors')
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('songs.index', $band) }}', type: 'raised', content: 'Back to song list'}                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection