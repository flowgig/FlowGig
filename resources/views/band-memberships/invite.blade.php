@extends('layouts.master', ['currentBand' => $band])
@section('title', 'Invite new member')
@section('navbar-title', 'Invite new member')
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <breadcrumbs
                        v-bind:breadcrumb-items='[
                        {name: "Bands", link: "{{ route('bands.index') }}"},
                        {name: "{{ $band->name }}", link: "{{ route('bands.show', $band) }}"},
                        {name: "Band members", link: "{{ route('band-memberships.index', $band) }}"},
                        {name: "Invite new", link: "{{ route('band-invitations.create', $band) }}"}
                        ]'>
                </breadcrumbs>
                <div class="page-header">
                    <h1 class="page-title">Invite new band member</h1>
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('band-memberships.index', $band) }}', type: 'raised', content: 'Back to members'}                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>
                <div class="content-container raised">
                    <p>Select an existing FlowGig user <span style="text-decoration: line-through">or invite anyone by just typing their e-mail address</span>
                        <i>(coming)</i>.</p>

                    <invitation
                            v-bind:form-data="{
                                postUrl: '{{ route('band-invitations.store', $band) }}',
                                viewType: 'create',
                                savedValues: {
                                    users: {{  $users }},
                                    bandName: '{{ $band->name }}',
                                    message: '{{ old('message') }}'
                                }
                            }">
                    </invitation>
                </div>


                @include('errors.validation-errors')


                <div class="page-footer">
                    <div class="button-row">
                        <custom-button-row
                                v-bind:button-row="{
                                buttons: [
                                    {link: '{{ route('band-memberships.index', $band) }}', type: 'raised', content: 'Back to members'}                                ]
                            }">
                        </custom-button-row>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
