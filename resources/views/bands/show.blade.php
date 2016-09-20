@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Setlist - ' . $band->name)
@section('navbar-title', $band->name)
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
                            <span itemprop="name">{{$band->name}}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                </ol>
                <h1>{{ $band->name }}</h1>
                <ul>
                    <li><a href="{{ route('songs.index', $band) }}">Songs</a></li>
                    <li><a href="{{ route('gigs.index', $band) }}">Gigs</a></li>
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.index') }}">Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection