@extends('layouts.master')
@section('title', $song->title)
@section('navbar-title', $song->title)
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="content">
                <div class="box">
                    <div class="content">
                        <h1>{{ $song->title }}</h1>
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