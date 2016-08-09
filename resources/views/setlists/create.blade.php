@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Create new setlist')
@section('navbar-title', 'Create setlist')
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
                        <a itemprop="item" href="{{ route('setlists.index', $band) }}">
                            <span itemprop="name">Setlists</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlists.create', $band) }}">
                            <span itemprop="name">Create new setlist</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <h1>Create new setlist</h1>
                <p>for <a href="{{ route('bands.show', $band) }}">{{ $band->name }}</a></p>
                <form action="{{ route('setlists.store', $band) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="title" id="title"/>
                            <label for="title">Title</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="description" id="description"/>
                            <label for="description">Description</label>
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
            </div>
        </div>
    </div>
@endsection