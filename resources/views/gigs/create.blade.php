@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Create new gig')
@section('navbar-title', 'Create gig')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $band) }}"},
                        {name: "Create new gig", link: "{{ route('gigs.create', $band) }}"}
                        ]'>
                </breadcrumbs>
                <h1>Create new gig</h1>
                <form action="{{ route('gigs.store', $band) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-4">
                            <input type="text" name="name" id="name"/>
                            <label for="name">Name</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="venue" id="venue"/>
                            <label for="venue">Venue</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="location" id="location"/>
                            <label for="location">Location</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <input type="text" name="date" id="date"/>
                            <label for="date">Date</label>
                        </div>
                        <div class="input-group col-sm-4">
                            <select name="status" id="status">
                                <option></option>
                                <option>Proposed</option>
                                <option>Settled</option>
                                <option>Public</option>
                            </select>
                            <label for="status">Status</label>
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