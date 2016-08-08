@extends('layouts.master')
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
                <p>show the band <i>{{ $band->name }}</i> ...</p>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.index') }}">Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection