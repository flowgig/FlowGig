@extends('layouts.master')
@section('title', 'Songs')
@section('navbar-title', 'Songs')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('song.index') }}">
                            <span itemprop="name">Songs</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                </ol>
                <h1>Songs</h1>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('song.create') }}">Create new</a>
                </div>
                <ul class="list menu-list">
                    @foreach($songs as $song)
                        <li itemscope itemtype="http://schema.org/MusicGroup">
                            <span class="list-item-content">
                                <span itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">
                                    <span itemprop="name">{{ $song->title }}</span>
                                </span>
                                <small>(
                                    <span itemprop="name">{{ $song->music_by }}</span> /
                                    {{ $song->lyrics_by }}
                                    )
                                </small>
                            </span>
                            <span class="list-item-buttons">
                                <a class="button button-icon button-flat button-default tooltip" title="Show {{$song->title}}" href="{{ route('song.show', $song) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a class="button button-icon button-flat button-default tooltip" title="Edit {{$song->title}}" href="{{ route('song.edit', $song) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <form action="{{ route('song.destroy', $song) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="button button-icon button-flat button-default tooltip" title="Delete {{$song->title}}">
                                         <span class="fa fa-trash"></span>
                                     </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('song.create') }}">Create new</a>
                </div>
            </div>
        </div>
    </div>
@endsection