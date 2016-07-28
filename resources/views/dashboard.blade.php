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
                <h2>Bands</h2>
                <div class="content">
                   @foreach($bands as $band)
                        <div class="button border-row float-left">
                            <a href="{{ route('band.show', $band) }}">{{ $band->name }}</a>
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection