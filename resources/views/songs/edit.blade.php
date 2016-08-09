@extends('layouts.master')
@section('title', $song->title)
@section('navbar-title', $song->title)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.index', $song->band_id) }}">
                            <span itemprop="name">Songs</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.show', $song) }}">
                            <span itemprop="name">{{$song->title}}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.edit', $song) }}">
                            <span itemprop="name">Edit song</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                </ol>
                <h1>{{ $song->title }}</h1>
                <p>by <a href="{{ route('bands.show', $song->band) }}">{{ $song->band->name }}</a></p>
                <form action="{{ route('songs.update', $song) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="title" id="title" value="{{ $song->title }}" placeholder="The song title"/>
                            <label for="title">Title</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="lyrics_by" id="lyrics-by" value="{{ $song->lyrics_by }}" placeholder="The lyrics author"/>
                            <label for="lyrics-by">Lyrics by</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="music_by" id="music-by" value="{{ $song->music_by }}" placeholder="The music composer"/>
                            <label for="music-by">Music by</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <button type="submit" class="button button-flat button-primary">Update</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                @include('errors.validation-errors')
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('songs.index', $song->band_id) }}">Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection