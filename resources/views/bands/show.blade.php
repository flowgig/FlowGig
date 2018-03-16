@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Setlist - ' . $band->name)
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
                <div class="text-right">
                    <a class="button button-icon button-flat button-default tooltip" title="Edit {{ $band->name }}"
                       style="margin-bottom: 20px"
                       href="{{ route('bands.edit', $band) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
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
                @include('meta.user-timestamps', ['model' => $band])
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.index') }}">Manage bands</a>
                </div>
            </div>
        </div>
    </div>
@endsection