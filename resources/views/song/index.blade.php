@extends('layouts.master')
@section('title', 'Songs')
@section('content')
    <div class="content">
        <div class="box z-1">
            <div class="content">
                <ul class="list">
                    @foreach($songs as $song)
                        <li><a href="{{ route('song.show', $song) }}">show</a>
                            <a href="{{ route('song.edit', $song) }}">edit</a> {{ $song->title }} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection