@extends('layouts.master')
@section('title', 'Setlists')
@section('content')
    <div class="content">
        <div class="box z-1">
            <div class="content">
                <ul class="list">
                    @foreach($setlists as $setlist)
                        <li><a href="{{ route('setlist.show', $setlist) }}">show</a>
                            <a href="{{ route('setlist.edit', $setlist) }}">edit</a> {{ $setlist->title }} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection