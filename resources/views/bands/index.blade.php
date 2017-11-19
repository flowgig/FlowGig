@extends('layouts.master')
@section('title', 'Bands')
@section('navbar-title', 'Bands')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">Bands</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.create') }}', type: 'raised', theme: 'primary', content: 'New band'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
                <div class="content-container raised">
                    @if($bands->count() > 0)
                        <bands v-bind:list-items="{{ $bands }}"></bands>
                    @else
                        <p>You're not a member of any bands yet</p>
                    @endif
                </div>
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.create') }}', type: 'raised', theme: 'primary', content: 'New band'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection