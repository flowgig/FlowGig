@extends('layouts.master')
@section('title', 'Setlist - ' . $setlist->title)
@section('content')
    <div class="content">
        <div class="box z-1">
            <div class="content">
                <p>show the setlist <i>{{ $setlist->title }}</i> ...</p>
                <a href="{{ route('setlist.index') }}">list</a>
            </div>
        </div>
    </div>
@endsection