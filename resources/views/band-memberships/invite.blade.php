@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Invite new member')
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
                        <a itemprop="item" href="{{ route('band-memberships.index', $band) }}">
                            <span itemprop="name">Band members</span>
                        </a>
                        <meta itemprop="position" content="3"/>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('band-invitations.create', $band) }}">
                            <span itemprop="name">Invite new</span>
                        </a>
                        <meta itemprop="position" content="4"/>
                    </li>
                </ol>
                <h1>Invite new band member</h1>
                <p>Select an existing FlowGig user <span style="text-decoration: line-through">or invite anyone by just typing their e-mail address</span> <i>(coming)</i>.</p>
                <form action="{{ route('band-invitations.store', $band) }}" method="POST" id="invitee-select">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-group col-sm-6">
                            <select v-model="invitee" autocomplete="off" class="is-not-empty">
                                <option value="" disabled>Select existing FlowGig user</option>
                                <option v-for="user in users" :value="user">@{{ user.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-6">
                            <input type="hidden" name="invitee_id" :value="invitee.id">
                            <input readonly
                                   type="text" name="invitee_email" id="invitee_email"
                                   placeholder="invited@flowgig.com"
                                   autocomplete="off"
                                   v-on:keydown="invitee = ''"
                                   :value="invitee.email"
                                   :class="[invitee ? 'is-not-empty': '']"/>
                            <label for="invitee_email">E-mail address for the invited</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-sm-6">
                            <input type="text" name="message" id="message"
                                   placeholder="Awesome if you'll join {{ $band->name }}!"
                                   value="{{ old('message') }}"/>
                            <label for="message">A message to the invited</label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="input-group col-md-4">
                            <button type="submit" class="button button-flat button-primary">Invite</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-4">
                            {{--<small>The invited will be notified by e-mail</small>--}}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
                @include('errors.validation-errors')
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('band-memberships.index', $band) }}">Back
                        to members</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        new Vue({
            el: '#invitee-select',
            data: {
                users: {!! $users !!},
                invitee: ''
            }
        });
    </script>
@endsection
