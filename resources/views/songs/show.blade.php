@extends('layouts.master', ['currentBand' => $song->band])
@section('title', 'Song - ' . $song->title)
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
                <br />
                <h3>Links</h3>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="block text-right">
                            <a class="button button-flat button-primary" href="{{ route('song-links.create', $song) }}">
                                New link
                            </a>
                        </div>
                        <ul class="list">
                            @foreach($song->links as $link)
                                <li>
                                    <span class="list-item-content single-line">
                                    <a class="tooltip" href="{{ $link->url }}" target="_blank" title="{{ $link->url }}">
                                        {{ $link->text ?? $link->url }}
                                    </a>
                                        </span>
                                    <span class="list-item-buttons">
                                        <a class="button button-icon button-flat button-default tooltip"
                                           title="Edit link {{ $link->text }}"
                                           href="{{ route('song-links.edit', $link) }}">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                        <form action="{{ route('song-links.destroy', $link) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"
                                                    onclick="return confirm('This deletes the link {{ addslashes($link->text) }}')"
                                                    class="button button-small button-icon button-flat button-default tooltip"
                                                    title="Delete link {{ $link->text }}">
                                                 <span class="fa fa-trash"></span>
                                            </button>
                                        </form>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="block text-right">
                    @if(strpos(URL::previous(), 'setlist'))
                        <a class="button button-flat button-default" href="{{ URL::previous() }}">Back to setlist</a>
                    @else
                        <a class="button button-flat button-default" href="{{ route('songs.index', $song->band) }}">Back to song list</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection