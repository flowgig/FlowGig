@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Setlists')
@section('navbar-title', 'Setlists')
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
                        <a itemprop="item" href="{{ route('setlists.index', $band) }}">
                            <span itemprop="name">Setlists</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                </ol>
                <h1>Setlists</h1>
                <p>by <a href="{{ route('bands.show', $band) }}">{{ $band->name }}</a></p>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('setlists.create', $band) }}">Create new</a>
                </div>
                <ul class="list menu-list">
                    @foreach($band->setlists as $setlist)
                        <li>
                            <span class="list-item-content">
                                {{ $setlist->title }}
                                <small>{{ $setlist->description }}</small>
                            </span>
                            <span class="list-item-buttons">
                                <a class="button button-icon button-flat button-default tooltip" title="Show {{$setlist->title}}" href="{{ route('setlists.show', $setlist) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a class="button button-icon button-flat button-default tooltip" title="Edit {{$setlist->title}}" href="{{ route('setlists.edit', $setlist) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <form action="{{ route('setlists.destroy', $setlist) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            onclick="return confirm('This deletes the setlist {{ $setlist->title }}')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Delete {{$setlist->title}}">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('setlists.create', $band) }}">Create new</a>
                </div>
            </div>
        </div>
    </div>
@endsection