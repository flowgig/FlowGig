@extends('layouts.master')
@section('title', $song->title)
@section('content')
    <div class="content">
        <div class="box z-1">
            <div class="content">
                <p>edit the song <i>{{ $song->title }}</i> ...</p>
                <a href="{{ route('song.index') }}">list</a>
            </div>
        </div>
    </div>
@endsection