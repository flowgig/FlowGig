@extends('layouts.master', ['currentBand' => $band])
@section('title', 'New band member')
@section('navbar-title', 'New band member')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items="[
                        {name: 'Bands', link: '{{ route('bands.index') }}'},
                        {name: '{{ $band->name }}', link: '{{ route('bands.show', $band) }}'},
                        {name: 'Band members', link: '{{ route('band-memberships.index', $band) }}'},
                        {name: 'New band member', link: '{{ route('band-memberships.create', $band) }}'}
                        ]">
                </breadcrumbs>
                <h1>Add new band member</h1>
                <div class="row">
                    <div class="block text-right">
                        <a class="button button-flat button-default"
                           href="{{ route('band-memberships.index', $band) }}">Back to members</a>
                    </div>
                </div>
                <div class="row">
                    <ul class="list menu-list">
                        @foreach($users as $user)
                            <li itemscope itemtype="http://schema.org/MusicGroup">
                            <span class="list-item-content single-line">
                                <span itemprop="user" itemscope itemtype="http://schema.org/musicGroupMember">
                                    <span>{{ $user->name }}</span>
                                </span>
                            </span>
                                <span class="list-item-buttons">
                                <form action="{{ route('band-memberships.store', $band) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                                    <button type="submit"
                                            onclick="return confirm('This adds {{ $user->name }} to {{ $band->name }}\'s members')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Add {{ $user->name }}">
                                         <span class="fa fa-plus"></span>
                                    </button>
                                 </form>
                            </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="block text-right">
                        <a class="button button-flat button-default"
                           href="{{ route('band-memberships.index', $band) }}">Back to members</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
