@extends('layouts.master', ['currentBand' => $song->band])
@section('title', 'Song - ' . $song->title)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $song->band->name }}", link: "{{ route('bands.show', $song->band) }}"},
                        {name: "Songs", link: "{{ route('songs.index', $song->band) }}"},
                        {name: "{{$song->title}}", link: "{{ route('songs.show', $song) }}"}
                        ]'>
                </breadcrumbs>
                <h1>{{ $song->title }}</h1>
                <div class="content-container raised">
                    <song url="{{ route('songs.edit', $song) }}"
                         method="GET"
                         v-bind:values="{{ $song }}">
                    </song>
                </div>
                @include('meta.user-timestamps', ['model' => $song])
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('songs.index', $song->band) }}', type: 'raised', content: 'Back to song list'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection