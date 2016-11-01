@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Band members')
@section('navbar-title', 'Band members')
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
                </ol>
                <h1>Members</h1>
                <div class="block text-right">
                    <a class="button button-flat button-primary">Create new</a>
                </div>
                <ul class="list menu-list">
                    @foreach($band->memberships as $membership)
                        <li itemscope itemtype="http://schema.org/MusicGroup">
                            <span class="list-item-content">
                                <span itemprop="member" itemscope itemtype="http://schema.org/musicGroupMember">
                                    <span itemprop="name">{{ $membership->user->name }}</span>
                                </span>
                            </span>
                            <span class="list-item-buttons">
                                <form action="{{ route('band-memberships.destroy', $membership) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            onclick="return confirm('This removes {{ $membership->user->name }}')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Remove {{ $membership->user->name }}">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-primary">Create new</a>
                </div>
            </div>
        </div>
    </div>
@endsection