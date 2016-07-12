@extends('layouts.master')
@section('title', 'Setlists')
@section('navbar-title', 'Setlists')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('setlist.index') }}">
                            <span itemprop="name">Setlists</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                </ol>
                <h1>Setlists</h1>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('setlist.create') }}">Create new</a>
                </div>
                <ul class="list">
                    @foreach($setlists as $setlist)
                        <li>
                            <span class="list-item-content">
                                {{ $setlist->title }}
                                <small>{{ $setlist->description }}</small>
                            </span>
                            <span class="list-item-buttons">
                                <a class="button button-icon button-flat tooltip" title="Show {{$setlist->title}}" href="{{ route('setlist.show', $setlist) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a class="button button-icon button-flat tooltip" title="Edit {{$setlist->title}}" href="{{ route('setlist.edit', $setlist) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <form action="{{ route('setlist.destroy', $setlist) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="button button-icon button-flat tooltip" title="Delete {{$setlist->title}}">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('setlist.create') }}">Create new</a>
                </div>
            </div>
        </div>
    </div>
@endsection