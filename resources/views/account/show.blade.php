@extends('layouts.master')
@section('title', 'Account - ' . $user->name)
@section('navbar-title', $user->name)
@section('content')
    <div class="content">
        <div class="box">
            <div class="content">
                <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="breadcrumbs">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ route('account.show', $user) }}">
                            <span itemprop="name">{{ $user->name }}</span>
                        </a>
                        <meta itemprop="position" content="1"/>
                    </li>
                </ol>
                <h1>My account</h1>
                <div class="text-right">
                    <a class="button button-icon button-flat button-default tooltip" title="Edit account"
                       href="{{ route('account.edit') }}"><span class="fa fa-pencil"></span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list">
                            <li><b>Name: </b> {{ $user->name }}</li>
                            <li><b>E-mail: </b> {{ $user->email }}</li>
                            <li><b>Account created: </b> {{ $user->created_at->toDateString() }}</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <i><small>Last updated {{ $user->updated_at }} UTC</small></i>
                </div>
                <div class="block text-right">
                    <a class="button button-flat button-default" href="{{ route('dashboard') }}">Back to dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
