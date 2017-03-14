@extends('layouts.master', ['currentBand' => $song->band])
@section('title', 'Song - ' . $song->title)
@section('navbar-title', $song->title)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('bands.index') }}">
                            <span itemprop="name">Bands</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('bands.show', $song->band) }}">
                            <span itemprop="name">{{ $song->band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.index', $song->band) }}">
                            <span itemprop="name">Songs</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.show', $song) }}">
                            <span itemprop="name">{{$song->title}}</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <h1>{{ $song->title }}</h1>
                <div class="text-right">
                    <a class="button button-icon button-flat button-default tooltip" title="Edit {{$song->title}}"
                       href="{{ route('songs.edit', $song) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list">
                            <li><b>Artist: </b> {{ $song->artist }}</li>
                            <li><b>Lyrics: </b> {{ $song->lyrics_by }}</li>
                            <li><b>Music: </b> {{ $song->music_by }}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p><i>The following properties are defaults which may be set
                                different for each instance of this song in setlists</i>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list">
                            <li><b>Key: </b> {{ $song->key }}</li>
                            <li><b>BPM: </b> {{ $song->bpm }}</li>
                            <li><b>Duration: </b> {{ $song->duration }}</li>
                            <li><b>Intensity: </b> {{ $song->intensity }}</li>
                        </ul>
                    </div>
                </div>
                @include('meta.user-timestamps', ['model' => $song])
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('songs.index', $song->band) }}">Back to song list</a>
                </div>
            </div>
        </div>
    </div>
@endsection