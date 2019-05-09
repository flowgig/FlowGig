@extends('layouts.master')
@section('title', 'Bands')
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
                </ol>
                <h1>Bands</h1>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('dashboard') }}">Back to dashboard</a>
                    <a class="button button-flat button-primary" href="{{ route('bands.create') }}">New band</a>
                </div>
                @include('errors.validation-errors')
                <ul class="list menu-list">
                    @foreach($bands as $band)
                        <li>
                            <span class="list-item-content single-line">
                                <a class="tooltip" title="Show {{ $band->name }}"
                                   href="{{ route('bands.show', $band) }}">{{ $band->name }}
                                </a>
                            </span>
                            <span class="list-item-buttons">
                                <a class="button button-icon button-flat button-default tooltip" title="Edit {{$band->name}}" href="{{ route('bands.edit', $band) }}">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <button class="toggle-elements button button-icon button-flat button-default tooltip"
                                        title="Delete {{ $band->name }}"
                                        value="delete-band-modal-{{ $band->id }}">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </span>
                        </li>
                        <div class="modal delete-band-modal-{{ $band->id }}">
                            <div class="modal-container">
                                <div class="modal-header">
                                    Delete the band:
                                    <button class="modal-close toggle-elements"
                                            value="delete-band-modal-{{ $band->id }}"></button>
                                </div>
                                <div class="modal-content">
                                    <form action="{{ route('bands.destroy', $band) }}" method="POST" class="block">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="row">
                                            <div class="input-group col-sm-12">
                                                <input id="bandname-{{ $band->id }}" type="text" name="bandname" required/>
                                                <label for="bandname-{{ $band->id }}">Enter band name to confirm</label>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <button type="submit"
                                                onclick="return confirm('This deletes the band {{ addslashes($band->name) }}')"
                                                class="button button-flat button-warning float-right tooltip"
                                                title="Delete {{ $band->name }}">Delete band
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('dashboard') }}">Back to dashboard</a>
                    <a class="button button-flat button-primary" href="{{ route('bands.create') }}">New band</a>
                </div>
            </div>
        </div>
    </div>
@endsection