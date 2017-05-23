@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Band members')
@section('navbar-title', 'Band members')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Band members", link: "{{ route('band-memberships.index', $band) }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">Members</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('band-memberships.create', $band) }}', type: 'raised', theme: 'primary', content: 'New member'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
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
                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('bands.show', $band) }}', type: 'raised', content: 'Back to band'},
                                    {link: '{{ route('band-memberships.create', $band) }}', type: 'raised', theme: 'primary', content: 'New member'}
                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function validateDelete(userId, userName) {
            if ({{ $band->memberships->count() }} == 1)
            {
                alert('You are the last member and cannot be removed.\n(You\'ll have to delete the band)');
                return false;
            }
        else
            if (userId == {{ Auth::user()->id }}) {
                return confirm('This completely removes your access to the band {{ $band->name }}')
            }
            return confirm('This removes ' + userName)
        }
    </script>
@endsection