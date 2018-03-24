@extends('layouts.master', ['currentBand' => $song->band])
@section('title', 'Edit song - ' . $song->title)
@section('content')
    <div class="content">
        <breadcrumbs
                v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $song->band->name }}", link: "{{ route('bands.show', $song->band) }}"},
                        {name: "Songs", link: "{{ route('songs.index', $song->band) }}"},
                        {name: "{{$song->title}}", link: "{{ route('songs.show', $song) }}"},
                        {name: "Edit song", link: "{{ route('songs.edit', $song)  }}"}
                        ]'>
        </breadcrumbs>
        <h1>{{ $song->title }}</h1>
        <div class="content-container raised">
            <song url="{{ route('songs.update', $song) }}"
                  method="PUT"
                  v-bind:values="{{ $song }}">
            </song>
        </div>
        @include('errors.validation-errors')
        @include('meta.user-timestamps', ['model' => $song])
        <div class="page-footer">
            <div class="button-row">
                <custom-button-row
                        v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('songs.index', $song->band_id) }}', type: 'raised', content: 'Back to song list'}                                ]
                            }">
                </custom-button-row>
            </div>
        </div>
    </div>
@endsection