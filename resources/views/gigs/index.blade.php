@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Gigs')
@section('navbar-title', 'Gigs')
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
                        <a itemprop="item" href="{{ route('gigs.index', $band) }}">
                            <span itemprop="name">Gigs</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                </ol>
                <h1>Gigs</h1>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('gigs.create', $band) }}">Create new</a>
                </div>
                <ul class="list menu-list">
                    @foreach($band->gigs->where('name', '<>', '_system_') as $gig)
                        <li>
                            <span class="list-item-content">
                                {{ $gig->name }}
                                <small>{{ $gig->date }}</small>
                            </span>
                            <span class="list-item-buttons">
                                @if($gig->setlist)
                                    <a class="button button-icon button-flat button-default tooltip"
                                       title="Edit setlist" href="{{ route('setlists.edit', $gig->setlist) }}">
                                        <span class="fa fa-list"></span>
                                    </a>
                                @else
                                    <button class="toggle-elements button button-icon button-flat button-default tooltip"
                                            title="Create setlist"
                                            value="add-setlist-modal-{{$gig->id}}">
                                         <span class="fa fa-plus"></span>
                                        </button>
                                    <div class="modal add-setlist-modal-{{$gig->id}}">
                                        <div class="modal-container">
                                            <div class="modal-header">
                                                Create setlist:
                                                <button class="modal-close toggle-elements"
                                                        value="add-setlist-modal-{{$gig->id}}"></button>
                                            </div>
                                            <div class="modal-content">
                                                <form action="{{ route('setlists.store', $gig) }}" method="POST"
                                                      class="block">
                                                    {{ csrf_field() }}
                                                    <div class="input-group">
                                                        <select name="sourceGigId">
                                                            <option value="new"
                                                                    selected="selected">Create new setlist</option>
                                                            @foreach($band->gigs->where('name', '<>', '_system_') as $gig)
                                                                <option value="{{ $gig->id }}">Copy from {{ $gig->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="title">Template</label>
                                                    </div>
                                                    <button type="submit"
                                                            class="button button-flat button-primary float-right tooltip"
                                                            title="Create setlist">Create setlist
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <a class="button button-icon button-flat button-default tooltip"
                                   title="Show {{$gig->title}}" href="{{ route('gigs.show', $gig) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a class="button button-icon button-flat button-default tooltip"
                                   title="Edit {{$gig->title}}" href="{{ route('gigs.edit', $gig) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <form action="{{ route('gigs.destroy', $gig) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            onclick="return confirm('This deletes the gig {{ $gig->title }}')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Delete {{$gig->title}}">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('gigs.create', $band) }}">Create new</a>
                </div>
            </div>
        </div>
    </div>
@endsection