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
    @include('setlists.export-modal')
@endsection
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $setlist->gig->band->name  }}", link: "{{ route('bands.show', $setlist->gig->band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $setlist->gig->band)  }}"},
                        {name: "{{ $setlist->gig->name }}", link: "{{ route('gigs.show', $setlist->gig) }}"},
                        {name: "Setlist", link: "{{ route('setlists.show', $setlist) }}"}
                        ]'>
                </breadcrumbs>
                <p style="font-size: x-large">Setlist for</p>
                <h1>{{ $setlist->gig->name }}</h1>
                <p style="font-size: large">{{ $setlist->gig->date }}
                    at {{ $setlist->gig->venue }}, {{ $setlist->gig->location }}
                </p>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.show', $setlist->gig) }}">
                        Back to gig
                    </a>
                    <a class="button button-icon button-flat button-default tooltip"
                       title="Edit setlist for {{ $setlist->gig->name }}"
                       href="{{ route('setlists.edit', $setlist) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
                <small>{{ $setlist->setlistSongs->count() }} songs</small>
                <div>
                    <ul class="list">
                        @foreach($setlist->setlistSongs->sortBy('number_in_list') as $setlistSong)
                            <li class="setlistsong">
                                <span class="list-item-content single-line">{{ $setlistSong->song->title }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <small>{{ $setlist->setlistSongs->count() }} songs</small>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.show', $setlist->gig) }}">
                        Back to gig
                    </a>
                    <a class="button button-icon button-flat button-default tooltip"
                       title="Edit setlist for {{ $setlist->gig->name }}"
                       href="{{ route('setlists.edit', $setlist) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
