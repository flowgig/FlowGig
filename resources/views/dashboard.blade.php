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






                <div id="dashboard" class="content">
                    <p>Name: {{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <br>
                    <h2>Upcoming gigs</h2>

                    <upcoming-gigs></upcoming-gigs>

                    <h2>Bands</h2>
                    <div class="block text-right">
                        <a class="button button-flat button-default" href="{{ route('bands.index') }}">Manage bands</a>
                    </div>
                    <band-cards></band-cards>


                @foreach($user->bands as $band)
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection