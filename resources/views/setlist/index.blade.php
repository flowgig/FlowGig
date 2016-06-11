@extends('layouts.master')
@section('title', 'Setlists')
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="content">
                <div class="box z-1">
                    <div class="content">
                        <h1>Setlists</h1>
                        <ul class="list">
                            @foreach($setlists as $setlist)
                                <li>
                                    <a class="button button-icon button-flat tooltip" title="Show {{$setlist->title}}" href="{{ route('setlist.show', $setlist) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                    <a class="button button-icon button-flat tooltip" title="Edit {{$setlist->title}}" href="{{ route('setlist.edit', $setlist) }}">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                    {{ $setlist->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection