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
                <h1>Bands</h1>
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('bands.create') }}">New band</a>
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
                <div class="block text-right">
                    <a class="button button-flat button-primary" href="{{ route('bands.create') }}">New band</a>
                </div>
            </div>
        </div>
    </div>
@endsection