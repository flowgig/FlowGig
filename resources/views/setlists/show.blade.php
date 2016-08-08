@extends('layouts.master')
@section('title', 'Setlist - ' . $setlist->title)
@section('navbar-title', $setlist->title)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlists.index') }}">
                            <span itemprop="name">Setlists</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlists.show', $setlist) }}">
                            <span itemprop="name">{{$setlist->title}}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                </ol>
                <h1>{{ $setlist->title }}</h1>
                <p>show the setlist <i>{{ $setlist->title }}</i> ...</p>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('setlists.index') }}">Back to list</a>
                </div>
            </div>
        </div>
    </div>
@endsection