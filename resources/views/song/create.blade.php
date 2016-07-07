@extends('layouts.master')
@section('title', 'Create new song')
@section('navbar-title', 'Create song')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('song.index') }}">
                            <span itemprop="name">Songs</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('song.create') }}">
                            <span itemprop="name">Create new song</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                </ol>
                <h1>Create new song</h1>
                <form action="{{ route('song.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="title" id="title" placeholder="The song title"/>
                            <label for="title">Title</label>
                        </div>


                        <div class="input-group col-sm-4">
                            <input type="text" name="music_by" id="music-by" placeholder="The song composer"/>
                            <label for="music-by">Music by</label>
                        </div>

                        <div class="input-group col-sm-4">
                            <input type="text" name="lyrics_by" id="lyrics-by" placeholder="The lyrics author"/>
                            <label for="lyrics-by">Lyrics by</label>
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
            </div>
        </div>
    </div>
    </div>
@endsection