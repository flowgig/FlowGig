@extends('layouts.master')
@section('title', $song->title)
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="content">
                <div class="box z-1">
                    <div class="content">
                        <p>edit the song <i>{{ $song->title }}</i> ...</p>
                        <div class="block text-right">
                            <a class="button button-flat button-primary" href="{{ route('song.index') }}">Back to list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection