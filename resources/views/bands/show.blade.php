@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Setlist - ' . $band->name)
@section('navbar-title', $band->name)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items="[
                        {name: 'Bands', link: '{{ route('bands.index') }}'},
                        {name: '{{ $band->name }}', link: '{{ route('bands.show', $band) }}'}
                        ]">
                </breadcrumbs>
                <h1>{{ $band->name }}</h1>
                <ul class="list hover-list box-list">
                    <li>
                        <a href="{{ route('songs.index', $band) }}"
                           class="list-item-content tooltip" title="Show songs">
                            <span class="fa fa-music"></span> Songs:
                            <span class="float-right">{{ count($band->songs) }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gigs.index', $band) }}"
                           class="list-item-content tooltip" title="Show gigs">
                            <span class="fa fa-calendar"></span> Gigs:
                            <span class="float-right">{{ count($band->gigs) }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('band-memberships.index', $band) }}"
                           class="list-item-content tooltip" title="Show members">
                            <span class="fa fa-group"></span> Members:
                            <span class="float-right">{{ count($band->members) }}</span>
                        </a>
                    </li>
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.index') }}">Manage bands</a>
                </div>
            </div>
        </div>
    </div>
@endsection