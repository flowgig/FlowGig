@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Band members')
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
                </ol>
                <h1>Members</h1>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">
                        Back to band
                    </a>
                    <a class="button button-flat button-primary" href="{{ route('band-invitations.create', $band) }}">
                        New member
                    </a>
                </div>
                <ul class="list menu-list">
                    @foreach($band->memberships as $membership)
                        <li itemscope itemtype="http://schema.org/MusicGroup">
                            <span class="list-item-content single-line">
                                <span itemprop="member" itemscope itemtype="http://schema.org/musicGroupMember">
                                    <span itemprop="name">{{ $membership->user->name }}</span>
                                </span>
                            </span>
                            <span class="list-item-buttons">
                                <form action="{{ route('band-memberships.destroy', $membership) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit"
                                            onclick="return validateDelete('{{ $membership->user->id }}', '{{ $membership->user->name }}')"
                                            class="button button-icon button-flat button-default tooltip"
                                            title="Remove {{ $membership->user->name }}">
                                         <span class="fa fa-trash"></span>
                                    </button>
                                 </form>
                            </span>
                        </li>
                    @endforeach
                </ul>
                @if($band->invitations()->count() > 0)
                <h2>Invitations</h2>
                <ul class="list menu-list">
                    @foreach($band->invitations as $invitation)
                        <li itemscope itemtype="http://schema.org/MusicGroup">
                            <span class="list-item-content">
                                <span itemprop="member" itemscope itemtype="http://schema.org/musicGroupMember">
                                    <span itemprop="name">{{ $invitation->inviteeName() }}</span>
                                </span>
                                <br />
                                <small>{{ $invitation->invitee_email }}</small>
                            </span>
                            <span class="list-item-buttons">
                                <div style="font-size: 0.7em; text-align:right">
                                    <span>{{ ucfirst($invitation->status) }}</span>
                                        @if($invitation->isPending())
                                            <form action="{{ route('band-invitations.set-expired', $invitation) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field('PUT') }}
                                                <button onclick="return validateSetInvitationExpired('{{ $invitation->inviteeName() }}')"
                                                        style="font-size: 10pt; line-height: 14pt; height:22px"
                                                        class="button button-icon button-flat button-default tooltip"
                                                        title="Set invitation expired">Set expired
                                            </button>
                                        </form>
                                        @endif
                                    <small style="font-size: 10pt; line-height: 14pt; display: block">{{ $invitation->status_set_at }}</small>
                                </div>
                            </span>
                            <div style="clear:both"></div>
                        </li>
                    @endforeach
                </ul>
                @endif
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('bands.show', $band) }}">
                        Back to band
                    </a>
                    <a class="button button-flat button-primary" href="{{ route('band-invitations.create', $band) }}">
                        New member
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function validateDelete(userId, userName) {
            if ({{ $band->memberships->count() }} == 1) {
                alert('You are the last member and cannot be removed.\n(You\'ll have to delete the band)');
                return false;
            }
            else if (userId == {{ Auth::user()->id }}) {
                return confirm('This completely removes your access to the band {{ $band->name }}')
            }
            return confirm('This removes ' + userName)
        }
        function validateSetInvitationExpired(inviteeName){
            return confirm('This sets the invitation for ' + inviteeName + ' expired');
        }
    </script>
@endsection