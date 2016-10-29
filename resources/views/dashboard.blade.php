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
                <p>Name: {{Auth::user()->name}}</p>
                {{Auth::user()->email}}
                <h2>Bands</h2>
                <div class="content">
                    <div class="row">
                        @foreach(Auth::user()->bands as $band)
                            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3'>
                                <div class="box primary z-1">
                                    <div class="box-header">
                                        <div class="content">
                                            <h3 class="box-title">{{ $band->name }}</h3>
                                        </div>
                                    </div>
                                    <div class='content'>
                                        <div class="float-right">
                                            <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">Show band</a>
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