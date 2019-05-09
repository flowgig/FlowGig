@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Songs')
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
                        <a itemprop="item" href="{{ route('bands.show', $band) }}">
                            <span itemprop="name">{{ $band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.index', $band) }}">
                            <span itemprop="name">Songs</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                </ol>
                <h1>Songs</h1>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">Back to band</a>
                    <a class="button button-flat button-primary" href="{{ route('songs.create', $band) }}">New song</a>
                </div>
                <ul class="list menu-list">
                    @foreach($band->songs->sortByDesc('created_at') as $song)
                        <li itemscope itemtype="http://schema.org/MusicGroup">
                            <span class="list-item-content">
                                <span itemprop="tracks" itemscope itemtype="http://schema.org/MusicRecording">
                                    <span itemprop="name">
                                        <a class="tooltip" title="Show {{ $song->title }}" href="{{ route('songs.show', $song) }}">{{ $song->title }}</a>
                                    </span>
                                </span>
                                <small>
                                    <span itemprop="name">{{ $song->artist }}</span>
                                </small>
                            </span>
                            <span class="list-item-buttons">
                                <a class="button button-icon button-flat button-default tooltip" title="Edit {{$song->title}}" href="{{ route('songs.edit', $song) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <form action="{{ route('songs.destroy', $song) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            onclick="return confirm('This deletes the song {{ addslashes($song->title) }}')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Delete {{$song->title}}">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">Back to band</a>
                    <a class="button button-flat button-primary" href="{{ route('songs.create', $band) }}">New song</a>
                </div>
            </div>
        </div>
    </div>
@endsection