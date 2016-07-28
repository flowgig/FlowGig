@extends('layouts.master')
@section('title', 'Create new band')
@section('navbar-title', 'Create band')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('band.index') }}">
                            <span itemprop="name">Bands</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('band.create') }}">
                            <span itemprop="name">Create new band</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                </ol>
                <h1>Create new band</h1>
                <form action="{{ route('band.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="name" id="name" placeholder="The Rolling Stones"/>
                            <label for="name">Band name</label>
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