@extends('layouts.master')
@section('title', 'Create new setlist')
@section('navbar-title', 'Create setlist')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlist.index') }}">
                            <span itemprop="name">Setlists</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlist.create') }}">
                            <span itemprop="name">Create new setlist</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                </ol>
                <h1>Create new setlist</h1>
                <p>create new setlist...</p>
            </div>
        </div>
    </div>
@endsection