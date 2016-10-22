<nav class="navbar navbar-dark z-2">
    <a class="sidenav-toggle hide-big"><i class="sidenav-toggle-logo fa fa-bars"></i></a>
    <a class="logo" href="/dashboard">
        <img src="/images/svg/flowgig-logo-white.svg" alt="FlowGig logo">
    </a>
    <span class="menu-divider hide-xsmall"></span>
    <span class="hide-big hide-xsmall navbar-page-title"> @yield('navbar-title')</span>
    @if($currentBand)
        <div class="main-menu hide-medium hide-small hide-xsmall">
            <div class="menu-link">
                <ul class="">
                    <li><a href="{{ route('songs.index', $currentBand) }}"><span class="icon fa fa-music"></span> Songs</a>
                    </li>
                    <li><a href="{{ route('gigs.index', $currentBand) }}"><span class="icon fa fa-calendar"></span> Gigs</a>
                    </li>
                    <li><a href="/dashboard"></a></li>
                </ul>
            </div>
        </div>
    @endif
    <div class="main-menu-user float-right hide-medium hide-small hide-xsmall">
        <ul>
            <li class="dropdown-menu">
                <span class="fa fa-user"></span>
                <span class="hide-medium hide-small hide-xsmall"> {{Auth::user()->name}}</span>
                <div class="dropdown-content">
                    <div class="dropdown-profile-content dropdown-content-container">
                        <span class="dropdown-profile-name">{{Auth::user()->name}}</span>
                        <span class="dropdown-profile-email">{{Auth::user()->email}}</span>
                        <div class="button-row">
                            <a class="button button-flat button-default" href="/dashboard">Dashboard</a>
                            <a class="button button-flat button-default" href="/dashboard">My account</a>
                        </div>
                    </div>
                    <span class="separator"></span>
                    {{-- <span class="dropdown-title">My bands</span>
                     <ul class="list hover-list">
                         @foreach($bands as $band)
                             <li><a href="{{ route('bands.show', $band) }}">{{ $band->name }}</a></li>
                         @endforeach
                     </ul>--}}
                    <div class="button-row dropdown-content-container">
                        <a class="button button-flat button-default float-right" href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Log out</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="left-menu no-padding">
    <div>
        <div class="sidenav-logo">
            <a class="sidenav-toggle">
                <img src="/images/svg/flowgig-logo-black.svg" alt="FlowGig logo">
                <i class="fa fa-angle-left float-right"></i>
                <span class="clearfix"></span>
            </a>
        </div>
        @if($currentBand)
            <ul class="">
                <li><a href="{{ route('songs.index', $currentBand) }}"><span class="icon fa fa-music"></span> Songs</a></li>
                <li><a href="{{ route('gigs.index', $currentBand) }}"><span class="icon fa fa-calendar"></span> Gigs</a>
                </li>
            </ul>
        @endif
        <ul class="">
            <li><a href="/dashboard"><span class="icon fa fa-dashboard"></span> Dashboard</a></li>
            <li><a href="#"><span class="icon fa fa-user"></span> My account</a></li>
            <li><a href="#"><span class="icon fa fa-sign-out"></span> Sign out</a></li>
        </ul>
    </div>
</div>