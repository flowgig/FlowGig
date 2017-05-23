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
                <ul class="list menu-list">
                    @foreach($bands as $band)
                        <li>
                            <span class="list-item-content single-line">
                                <a class="tooltip" title="Show {{ $band->name }}"
                                   href="{{ route('bands.show', $band) }}">{{ $band->name }}
                                </a>
                            </span>
                            <span class="list-item-buttons">
                                <a class="button button-icon button-flat button-default tooltip"
                                   title="Edit {{$band->name}}" href="{{ route('bands.edit', $band) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <form action="{{ route('bands.destroy', $band) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            onclick="return confirm('This deletes the band {{ $band->name }}')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Delete {{$band->name}}">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
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