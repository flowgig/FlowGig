@extends('layouts.master', ['currentBand' => $setlist->band])
@section('title', $setlist->title . ' - Edit')
@section('navbar-title', $setlist->title)
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
                        <a itemprop="item" href="{{ route('bands.show', $setlist->band) }}">
                            <span itemprop="name">{{ $setlist->band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlists.index', $setlist->band) }}">
                            <span itemprop="name">Setlists</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlists.show', $setlist) }}">
                            <span itemprop="name">{{ $setlist->title }}</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlists.edit', $setlist) }}">
                            <span itemprop="name">Edit setlist</span>
                        </a>
                        <meta itemprop="position" content="5"/>
                    </li>
                </ol>
                <h1>{{ $setlist->title }}</h1>
                <p>by <a href="{{ route('bands.show', $setlist->band) }}">{{ $setlist->band->name }}</a></p>
                <form action="{{ route('setlists.update', $setlist) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="title" id="title" value="{{ $setlist->title }}"/>
                            <label for="title">Title</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="description" id="description" value="{{ $setlist->description }}"/>
                            <label for="description">Description</label>
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
            </div>
        </div>
    </div>
@endsection