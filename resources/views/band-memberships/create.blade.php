@extends('layouts.master', ['currentBand' => $band])
@section('title', 'New band member')
@section('navbar-title', 'New band member')
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
                            <span itemprop="name">{{ $band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('band-memberships.index', $band) }}">
                            <span itemprop="name">Band members</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('band-memberships.create', $band) }}">
                            <span itemprop="name">New band member</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <h1>Add new band member</h1>
                <div class="row">
                    <ul class="list menu-list">
                        @foreach($users as $user)
                            <li itemscope itemtype="http://schema.org/MusicGroup">
                            <span class="list-item-content single-line">
                                <span itemprop="user" itemscope itemtype="http://schema.org/musicGroupMember">
                                    <span>{{ $user->name }}</span>
                                </span>
                            </span>
                                <span class="list-item-buttons">
                                <form action="{{ route('band-memberships.store', $band) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                                    <button type="submit"
                                            onclick="return confirm('This adds {{ $user->name }} to {{ $band->name }}\'s members')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Add {{ $user->name }}">
                                         <span class="fa fa-plus"></span>
                                    </button>
                                 </form>
                            </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
