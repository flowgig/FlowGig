@extends('layouts.master', ['currentBand' => $songLink->linkable->band])
@section('title', 'Edit link - ' . $songLink->text)
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
                        <a itemprop="item" href="{{ route('bands.show', $songLink->linkable->band) }}">
                            <span itemprop="name">{{ $songLink->linkable->band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.index', $songLink->linkable->band) }}">
                            <span itemprop="name">Songs</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('songs.show', $songLink->linkable) }}">
                            <span itemprop="name">{{ $songLink->linkable->title }}</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('song-links.create', $songLink->linkable) }}">
                            <span itemprop="name">Create link</span>
                        </a>
                        <meta itemprop="position" content="5"/>
                    </li>
                </ol>
                <h1>Update link</h1>
                <form action="{{ route('song-links.update', $songLink) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="text" id="text" value="{{ $songLink->text }}" placeholder="FlowGig"/>
                            <label for="text">Displayed text (optional)</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-10">
                            <input type="text" name="url" id="url" value="{{ $songLink->url }}" placeholder="https://www.flowgig.com"/>
                            <label for="url">URL</label>
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
                @include('meta.user-timestamps', ['model' => $songLink])
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('songs.show', $songLink->linkable) }}">
                        Back to song
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
