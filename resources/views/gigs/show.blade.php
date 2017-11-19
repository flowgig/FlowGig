@extends('layouts.master', ['currentBand' => $gig->band])
@section('title', 'Gig - ' . $gig->name)
@section('navbar-title', $gig->name)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "FlowGig", link: "/"},
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $gig->band->name }}", link: "{{ route('bands.show', $gig->band) }}"},
                        {name: "Gigs", link: "{{ route('gigs.index', $gig->band) }}"},
                        {name: "{{ $gig->name }}", link: "{{ route('gigs.show', $gig) }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">{{ $gig->name }}</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('gigs.index', $gig->band) }}', type: 'raised', content: 'Back to gig list'},
                                    @if($gig->setlist)
                                        {link: '{{ route('setlists.show', $gig->setlist) }}', type: 'raised', theme: 'primary', content: 'Show setlist'}
                                    @endif
                                        ]
                                    }">
                        </custom-button-row>
                        @if(!$gig->setlist)
                            <create-setlist
                                    v-bind:form-data="{
                                        savedValues: { gigsWithSetlist: {{ $gig->band->gigsWithSetlist }} },
                                        postUrl: '{{ route('setlists.store', $gig) }}'
                                    }"
                            >
                            </create-setlist>
                        @endif
                    </div>
                </div>
                <div class="content-container raised">
                    <gig v-bind:form-data="{
                        viewType: 'show',
                        editLink: '{{ route('gigs.edit', $gig) }}',
                        savedValues: {{ $gig }}
                            }">
                    </gig>
                </div>
                @include('meta.user-timestamps', ['model' => $gig])
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('gigs.index', $gig->band) }}', type: 'raised', content: 'Back to gig list'},
                                    @if($gig->setlist)
                                        {link: '{{ route('setlists.show', $gig->setlist) }}', type: 'raised', theme: 'primary', content: 'Show setlist'}
                                    @endif
                                        ]
                                    }">
                        </custom-button-row>
                        @if(!$gig->setlist)
                            <create-setlist
                                    v-bind:form-data="{
                                        savedValues: { gigsWithSetlist: {{ $gig->band->gigsWithSetlist }} },
                                        postUrl: '{{ route('setlists.store', $gig) }}'
                                    }"
                            >
                            </create-setlist>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
    <script>
        /*    $(document).ready(function () {
         $(".setlist-copy").val($(".setlist-template").val());
         });
         $(".setlist-template").change(function () {
         $(".setlist-copy").val($(this).val());
         });
         $("input[name='sourceGigId']").change(function () {
         $(".setlist-template").prop('disabled', $(this).data('disable-list'));
         });*/
    </script>
    --}}
@endsection
