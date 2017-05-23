@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Songs')
@section('navbar-title', 'Songs')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Songs", link: "{{ route('songs.index', $band) }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">Songs</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('songs.create', $band) }}', type: 'raised', theme: 'primary', content: 'New song'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
                <songs v-bind:songs="{{  $band->songs }}"></songs>
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('songs.create', $band) }}', type: 'raised', theme: 'primary', content: 'New song'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection