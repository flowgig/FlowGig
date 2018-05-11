@extends('layouts.master', ['currentBand' => $band])
@section('title', 'New gig')
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
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('gigs.create', $band) }}">
                            <span itemprop="name">Create new gig</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <h1>Create new gig</h1>
                <form action="{{ route('gigs.store', $band) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="date" id="date" value="{{ old('date') }}"/>
                            <label for="date">Date</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="venue" id="venue" value="{{ old('venue') }}"/>
                            <label for="venue">Venue</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="location" id="location" value="{{ old('location') }}"/>
                            <label for="location">Location</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="event" id="event" value="{{ old('event') }}"/>
                            <label for="name">Event</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-12">
                            <label for="description" class="textarea-label">Description:</label>
                            <textarea name="description" id="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-12">
                            <label for="internal-info" class="textarea-label">Internal info:</label>
                            <textarea name="internal_info" id="internal-info">{{ old('internal_info') }}</textarea>
                        </div>
                    </div>
                    <div class="input-group">
                        <input name="confirmed" id="confirmed" type="checkbox" {{ old('confirmed') ? 'checked' : '' }}/>
                        <label for="confirmed" class="input-field-height">Confirmed</label>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input name="public" id="public" type="checkbox" {{ old('public') ? 'checked' : '' }}/>
                            <label for="public" class="input-field-height">Public
                                <small class="fa fa-info-circle" id="publicTooltip" title="Mark the gig as public to make it available in the open Gigs API"></small>
                            </label>
                        </div>
                        <div class="input-group col-sm-4">
                            <div id="publicInfo" style="width: 330px; border: 1px solid #C32A22; border-radius: 5px;
                            padding: 5px; visibility: hidden">
                                <small>
                                    <b>The gig is made public</b>
                                    <i class="fa fa-exclamation-circle" style="float:right"></i><br/>
                                    All information entered on this page, except in the field Internal information, is
                                    made available to anyone.<br/><i>Fetch all public gigs for any band at the open
                                        <a href="{{ Request::root() }}/api/bands/{{ $band->id }}/gigs"
                                           target="_blank">Gigs API</a>
                                    </i>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <button type="submit" class="button button-flat button-primary">Create</button>
                        </div>
                    </div>
                </form>
                @include('errors.validation-errors')
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.index', $band) }}">
                        Back to gig list
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- TODO: Remove temporary date-picker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#date").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#publicTooltip").tooltip();

            if($("#public").is(':checked'))
                $("#publicInfo").css("visibility", "visible");
        });

        $("#public").change(function () {
            if(this.checked)
                this.checked = confirm('NB! This makes all information entered on this page (except in the field Internal information) available to anyone.');

            if(this.checked)
                $("#publicInfo").css('visibility', "visible");
            else
                $("#publicInfo").css("visibility", "hidden");
        });
    </script>

    <script src="/js/autosize.min.js"></script>
    <script>
        autosize(document.getElementById('description'));
        autosize(document.getElementById('internal-info'));
    </script>
@endsection