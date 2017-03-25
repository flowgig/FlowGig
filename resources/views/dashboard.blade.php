@extends('layouts.master')
@section('title', 'Dashboard')
@section('navbar-title', 'Dashboard')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="/dashboard">
                            <span itemprop="name">Dashboard</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                </ol>
                <h1>My FlowGig</h1>
                <p>Name: {{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <br>
                <h2>Upcoming gigs</h2>
                <div class="row">
                    <ul class="list menu-list">
                        @foreach($user->upcomingGigs()->sortBy('date') as $gig)
                            <li>
                            <span class="list-item-content">
                                @if($gig->status == 'Proposed')
                                    <span class="fa fa-question-circle-o" title="Status: Proposed">&nbsp;</span>
                                @endif
                                @if($gig->status == 'Settled')
                                    <span class="fa fa-check-circle-o " title="Status: Settled">&nbsp;</span>
                                @endif
                                @if($gig->status == 'Public')
                                    <span class="fa fa-globe" title="Status: Public">&nbsp;</span>
                                @endif
                                <a class="tooltip" title="Show {{ $gig->name }}" href="{{ route('gigs.show', $gig) }}">
                                    {{ $gig->name }}
                                </a>
                                <small class="inline"> with <a class="tooltip" title="Show {{ $gig->band->name }}"
                                       href="{{ route('bands.show', $gig->band) }}">{{ $gig->band->name }}</a>
                                </small>
                                <small>{{ $gig->date() }} - {{ $gig->venue }} - {{ $gig->location }}</small>
                            </span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <h2>Bands</h2>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.index') }}">Manage bands</a>
                </div>
                <div id="dashboard" class="content">
                    <div class="row">
                        @foreach($user->bands as $band)
                            <div class='col-xs-12 col-sm-6 col-md-4'>
                                <div class="box primary z-1">
                                    <div class="box-header">
                                        <div class="content">
                                            <h3 class="box-title">
                                                <a class="tooltip" href="{{ route('bands.show', $band) }}" title="Show {{$band->name}}">{{ $band->name }}</a>
                                            </h3>
                                            <ul class="box-header-dropdown">
                                                <li class="dropdown-menu">
                                                    <span class="fa fa-chevron-down"></span>
                                                    <div class="dropdown-content">
                                                        <ul class="list hover-list">
                                                            <li>
                                                                <a href="{{ route('bands.edit', $band) }}" class="tooltip" title="Edit {{$band->name}}">
                                                                    <span class="fa fa-cog"></span> Edit band
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('bands.destroy', $band) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <button type="submit"
                                                                            onclick="return confirm('This deletes the band {{ $band->name }}')"
                                                                            class="link-button tooltip"
                                                                            title="Delete {{$band->name}}">
                                                                        <span class="fa fa-trash"></span> Delete band
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class='content'>
                                        <ul class="list hover-list box-list">
                                            <li>
                                                <a href="{{ route('songs.index', $band) }}"
                                                   class="list-item-content tooltip" title="Show songs">
                                                    <span class="fa fa-music"></span> Songs:
                                                    <span class="float-right">{{ count($band->songs)}}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('gigs.index', $band) }}"
                                                   class="list-item-content tooltip" title="Show gigs">
                                                    <span class="fa fa-calendar"></span> Gigs:
                                                    <span class="float-right">{{ count($band->gigs)}}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('band-memberships.index', $band) }}"
                                                   class="list-item-content tooltip" title="Show members">
                                                    <span class="fa fa-group"></span> Members:
                                                    <span class="float-right">{{ count($band->members)}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="float-right">
                                            <a class="button button-flat button-default tooltip" href="{{ route('bands.show', $band) }}" title="Show {{$band->name}}">Show band</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection