@extends('layouts.master', ['currentBand' => $song->band])
@section('title', 'Create new link')
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
                            <span itemprop="name">{{ $song->title }}</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('song-links.create', $song->band) }}">
                            <span itemprop="name">Create link</span>
                        </a>
                        <meta itemprop="position" content="5"/>
                    </li>
                </ol>
                <h1>Create new link</h1>
                <form action="{{ route('song-links.store', $song) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="text" id="text" value="{{ old('text') }}" placeholder="FlowGig"/>
                            <label for="text">Displayed text (optional)</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-10">
                            <input type="text" name="url" id="url" value="{{ old('url') }}" placeholder="https://www.flowgig.com"/>
                            <label for="url">URL</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <button type="submit" class="button button-flat button-primary">Create</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                @include('errors.validation-errors')
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('songs.show', $song) }}">
                        Back to song
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
