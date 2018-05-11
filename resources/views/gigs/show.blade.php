@extends('layouts.master', ['currentBand' => $gig->band])
@section('title', 'Gig - ' . $gig->composedTitle())
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
                        <a itemprop="item" href="{{ route('bands.show', $gig->band) }}">
                            <span itemprop="name">{{ $gig->band->name }}</span>
                        </a>
                        <meta itemprop="position" content="2"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('gigs.index', $gig->band) }}">
                            <span itemprop="name">Gigs</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('gigs.show', $gig) }}">
                            <span itemprop="name">{{ $gig->composedTitle() }}</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <h1>{{ $gig->composedTitle() }}</h1>
                <div class="text-right">
                    <a class="button button-icon button-flat button-default tooltip" title="Edit gig"
                       href="{{ route('gigs.edit', $gig) }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list">
                            <li><b>Date: </b> {{ $gig->date() }}</li>
                            <li><b>Venue: </b> {{ $gig->venue }}</li>
                            <li><b>Location: </b> {{ $gig->location }}</li>
                            <li><b>Event: </b> {{ $gig->event }}</li>
                            <li><b>Description: </b>
                                <p style="padding-top: 10px; white-space: pre-wrap;">{{ $gig->description }}</p>
                            </li>
                            <li><b>Internal information: </b>
                                <p style="padding-top: 10px; white-space: pre-wrap;">{{ $gig->internal_info }}</p>
                            </li>
                            <li><b>Confirmed: </b>{{ $gig->confirmed ? 'Yes' : 'No' }}</li>
                            <li><b>Public: </b>{{ $gig->public ? 'Yes' : 'No' }}</li>
                        </ul>
                        @include('meta.user-timestamps', ['model' => $gig])
                        <br /><br />
                        <ul class="list menu-list">
                            <li>
                                <span class="list-item-content single-line">

                            @if($gig->setlist)
                                <a class="tooltip" title="Show setlist for the gig"
                                   href="{{ route('setlists.show', $gig->setlist) }}">Setlist
                            </a>
                            @else Setlist
                            @endif
                        </span>
                        <span class="list-item-buttons">
                        @if($gig->setlist)
                                        <a class="button button-icon button-flat button-default tooltip"
                                           title="Edit setlist for the gig"
                                           href="{{ route('setlists.edit', $gig->setlist) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                        <form action="{{ route('setlists.destroy', $gig->setlist) }}" method="POST">
                                    {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"
                                                    onclick="return confirm('This deletes the setlist for the gig')"
                                                    class="button button-icon button-flat button-default tooltip"
                                                    title="Delete setlist">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                                @else
                                    <button class="toggle-elements button button-icon button-flat button-default tooltip"
                                            title="Create setlist for the gig"
                                            value="add-setlist-modal-{{ $gig->id }}">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                    <div class="modal add-setlist-modal-{{ $gig->id }}">
                                        <div class="modal-container">
                                            <div class="modal-header">
                                                Create setlist for the gig:
                                                <button class="modal-close toggle-elements"
                                                        value="add-setlist-modal-{{ $gig->id }}"></button>
                                            </div>
                                            <div class="modal-content">
                                                <form action="{{ route('setlists.store', $gig) }}" method="POST"
                                                      class="block">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="input-group col-sm-12">
                                                            <input id="setlist-new-{{ $gig->id }}"
                                                                   name="sourceGigId" type="radio"
                                                                   value=""
                                                                   data-disable-list="true"
                                                                   data-gig-id="{{ $gig->id }}"
                                                                   checked="checked"/>
                                                            <label for="setlist-new-{{ $gig->id }}">Blank
                                                                setlist</label>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-group col-lg-3 col-md-2 col-sm-3">
                                                            <input id="setlist-copy-{{ $gig->id }}"
                                                                   name="sourceGigId" type="radio"
                                                                   value=""
                                                                   data-disable-list="false"
                                                                   class="setlist-copy"/>
                                                            <label for="setlist-copy-{{ $gig->id }}">Copy from:</label>
                                                        </div>
                                                        <div class="input-group col-lg-9 col-md-10 col-sm-9">
                                                            <select id="setlist-template-{{ $gig->id }}"
                                                                    class="setlist-template" disabled>
                                                                @foreach($gig->band->gigsWithSetlist as $gigWithSetlist)
                                                                    <option value="{{ $gigWithSetlist->id }}">
                                                                        {{ $gigWithSetlist->composedTitle() }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="setlist-template-{{ $gig->id }}">{{ $gig->band->name }}'s gigs having setlist</label>
                                                        </div>
                                                        <div class="clearfix"></div>
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
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.index', $gig->band) }}">
                        Back to gig list
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".setlist-copy").val($(".setlist-template").val());
        });
        $(".setlist-template").change(function () {
            $(".setlist-copy").val($(this).val());
        });
        $("input[name='sourceGigId']").change(function () {
            $(".setlist-template").prop('disabled', $(this).data('disable-list'));
        });
    </script>
@endsection
