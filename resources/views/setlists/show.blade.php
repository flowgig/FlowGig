@extends('layouts.master', ['currentBand' => $setlist->gig->band])
@section('title', 'Setlist - ' . $setlist->gig->name)
@section('navbar-title', $setlist->gig->name)
@section('actionbar')
    <div class="action-button">
        <i class="icon fa fa-plus"></i>
    </div>
    <div class="action-menu" id="action-menu">
        <button class="toggle-action-button toggle-modal tooltip" data-type="radio" title="Export setlist"
                value="export-setlist-modal">
                <span class="icon fa fa-download">
                </span>
        </button>
    </div>
    <div class="modal export-setlist-modal">
        <div class="modal-container">
            <div class="modal-header">
                Export setlist:
                <button class="modal-close toggle-modal"
                        value="export-setlist-modal"></button>
            </div>
            <div class="modal-content">
                <p>Toggle fields in setlist</p>
                <form action="{{ route('setlists.export', $setlist) }}" method="POST" target="_blank">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="checkbox" name="number_in_list" id="number_in_list"/>
                        <label for="number_in_list">Number in list</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="key" id="key" checked/>
                        <label for="key">Key</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="bpm" id="bpm"/>
                        <label for="bpm">BPM</label>
                    </div>
                    <input type="checkbox" name="duration" id="duration"/>
                    <label for="duration">Duration</label>
                    <div class="input-group">
                        <input type="checkbox" name="intensity" id="intensity"/>
                        <label for="intensity">Intensity</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="comment" id="comment" checked/>
                        <label for="comment">Comment</label>
                    </div>
                    <div class="input-group float-right">
                        <button type="submit" class="button button-flat button-default tooltip"
                                title="Export {{ $setlist->gig->name }} to PDF">
                            <label for="export">Export to PDF</label>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
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
                        <a itemprop="item" href="{{ route('bands.show', $setlist->gig->band) }}">
                            <span itemprop="name">{{ $setlist->gig->band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('gigs.index', $setlist->gig->band) }}">
                            <span itemprop="name">Gigs</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('gigs.show', $setlist->gig) }}">
                            <span itemprop="name">{{ $setlist->gig->name }}</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlists.show', $setlist) }}">
                            <span itemprop="name">Setlist</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <p style="font-size: x-large">Setlist for</p>
                <h1>{{ $setlist->gig->name }}</h1>
                <p style="font-size: large">{{ $setlist->gig->date }}
                    at {{ $setlist->gig->venue }}, {{ $setlist->gig->location }}
                </p>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.show', $setlist->gig) }}">
                        Back to gig
                    </a>
                    <a class="button button-icon button-flat button-default tooltip" title="Edit setlist for {{ $setlist->gig->name }}"
                       href="{{ route('setlists.edit', $setlist) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
                <div>
                <ul class="list">
                    @foreach($setlist->setlistSongs->sortBy('number_in_list') as $setlistSong)
                    <li class="setlistsong">
                        <span class="list-item-content single-line">{{ $setlistSong->song->title }}</span>
                    </li>
                    @endforeach
                </ul>
                </div>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.show', $setlist->gig) }}">
                        Back to gig
                    </a>
                    <a class="button button-icon button-flat button-default tooltip" title="Edit setlist for {{ $setlist->gig->name }}"
                       href="{{ route('setlists.edit', $setlist) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
