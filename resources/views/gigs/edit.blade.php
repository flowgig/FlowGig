@extends('layouts.master', ['currentBand' => $gig->band])
@section('title', $gig->name . ' - Edit')
@section('navbar-title', $gig->name)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $gig->band->name }}", link: "{{ route('bands.show', $gig->band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $gig->band) }}"},
                        {name: "{{ $gig->name }}", link: "{{ route('gigs.show', $gig) }}"},
                        {name: "Edit gig", link: "{{ route('gigs.edit', $gig) }}"}
                        ]'>
                </breadcrumbs>
                <h1>{{ $gig->name }}</h1>
                <form action="{{ route('gigs.update', $gig) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="name" id="name" value="{{ $gig->name }}"/>
                            <label for="name">Name</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="venue" id="venue" value="{{ $gig->venue }}"/>
                            <label for="venue">Venue</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="location" id="location" value="{{ $gig->location }}"/>
                            <label for="location">Location</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="date" id="date"
                                   value="{{ $gig->date() }}"/>
                            <label for="date">Date</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <select name="status" id="status">
                                <option></option>
                                <option @if($gig->status == 'Proposed') selected @endif>Proposed</option>
                                <option @if($gig->status == 'Settled') selected @endif>Settled</option>
                                <option @if($gig->status == 'Public') selected @endif>Public</option>
                            </select>
                            <label for="status">Status</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <button type="submit" class="button button-flat button-primary">Update</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                @include('errors.validation-errors')
                @include('meta.user-timestamps', ['model' => $gig])
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('gigs.index', $gig->band) }}">
                        Back to gig list
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- TODO: Remove temporary date-picker --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>

@endsection