@extends('layouts.master', ['currentBand' => $gig->band])
@section('title', 'Gig - ' . $gig->name)
@section('navbar-title', $gig->name)
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
                        <a itemprop="item" href="{{ route('bands.show', $gig->band) }}">
                            <span itemprop="name">{{ $gig->band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('gigs.index', $gig->band) }}">
                            <span itemprop="name">Gigs</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('gigs.show', $gig) }}">
                            <span itemprop="name">{{$gig->name}}</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <h1>{{ $gig->name }}</h1>
                <p>by <a href="{{ route('bands.show', $gig->band) }}">{{ $gig->band->name }}</a></p>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.index', $gig->band) }}">Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection