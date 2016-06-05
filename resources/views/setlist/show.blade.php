@extends('layouts.master')
@section('title', 'Setlist - ' . $setlist->title)
@section('content')
    <div class="content">
        <div class="box z-1">
            <div class="content">
                <p>show the setlist <i>{{ $setlist->title }}</i> ...</p>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('setlist.index') }}">Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection