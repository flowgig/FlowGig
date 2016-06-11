@extends('layouts.master')
@section('title', 'Songs')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="content">
                <div class="box z-1">
                    <div class="content">
                        <h1>Songs</h1>
                        <ul class="list">
                            @foreach($songs as $song)
                                <li>
                                    <a class="button button-icon button-flat tooltip" title="Show {{$song->title}}" href="{{ route('song.show', $song) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <a class="button button-icon button-flat tooltip" title="Edit {{$song->title}}" href="{{ route('song.edit', $song) }}">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    {{ $song->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection