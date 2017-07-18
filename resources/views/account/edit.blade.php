@extends('layouts.master')
@section('title', 'Edit account - ' . $user->name)
@section('navbar-title', $user->name)
@section('content')
    <div class="content">
        <div class="box">
            <p class="content">
            <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="{{ route('account.show', $user) }}">
                        <span itemprop="name">{{ $user->name }}</span>
                    </a>
                    <meta itemprop="position" content="1"/>
                </li>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="{{ route('account.edit', $user) }}">
                        <span itemprop="name">Edit account</span>
                    </a>
                    <meta itemprop="position" content="2"/>
                </li>
            </ol>
            <h1>Edit account</h1>
            <form action="{{ route('account.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="input-group col-sm-6">
                        <input type="text" name="name" id="name" value="{{ $user->name }}"
                               placeholder="Firstname Lastname" required/>
                        <label for="name">Name</label>
                    </div>
                    <div class="input-group col-sm-6">
                        <input type="text" name="email" id="email" value="{{ $user->email }}"
                               placeholder="E-mail" disabled style="color: gray"/>
                        <label for="email">E-mail</label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    {{--
                    <div class="input-group col-sm-4">
                        <input type="password" name="current_password" id="current_password"
                               placeholder="Current password"/>
                        <label for="current_password">Current password</label>
                    </div>
                    --}}
                    <div class="input-group col-sm-6">
                        <input type="password" name="password" id="password"
                               placeholder="New password"/>
                        <label for="password">New password</label>
                    </div>
                    <div class="input-group col-sm-6">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               placeholder="New password"/>
                        <label for="password_confirmation">Confirm new password</label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="input-group col-sm-4">
                        <button type="submit" class="button button-flat button-primary">Update</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </form>
            @include('errors.validation-errors')
            <div>
                <i><small>Last updated {{ $user->updated_at }} UTC</small></i>
            </div>
            <div class="block text-right">
                <a class="button button-flat button-default" href="{{ route('dashboard') }}">Back to dashboard</a>
            </div>
        </div>
    </div>
@endsection
