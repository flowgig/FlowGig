<nav class="navbar navbar-dark z-2">
    <span style="display: inline-block; width: 15px;"></span>
    <a class="logo" href="{{ route('dashboard') }}">
        <img src="/images/svg/flowgig-beta-logo-white.svg" alt="FlowGig beta logo">
    </a>
    <span class="menu-divider hide-xsmall"></span>
    @if($currentBand)
        <div class="hide-xsmall main-menu-band inline">
            <ul class="dropdown-container">
                <li class="dropdown-menu">
                    <span>{{ $currentBand->name }}</span>
                    <span class="fa fa-chevron-down"></span>
                    <div class="dropdown-content">
                        <ul class="list hover-list">
                            <li>
                                <a href="{{ route('songs.index', $currentBand) }}">
                                    <span class="icon fa fa-music"></span> Songs
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('gigs.index', $currentBand) }}">
                                    <span class="icon fa fa-calendar"></span> Gigs
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('band-memberships.index', $currentBand) }}">
                                    <span class="icon fa fa-group"></span> Members
                                </a>
                            </li>
                        </ul>
                        <span class="list-title">My bands</span>
                        <ul class="list hover-list">
                            @foreach(Auth::user()->bands as $band)
                                <li><a href="{{ route('bands.show', $band) }}">{{ $band->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    @endif
    <div class="main-menu-user float-right">
        <ul>
            <li class="dropdown-menu">
                <span class="fa fa-user hide-big"></span>
                <span class="hide-xsmall hide-medium hide-small hide-xsmall"> {{Auth::user()->name}}</span>
                <span class="hide-xsmall hide-medium hide-small hide-xsmall fa fa-chevron-down"></span>
                <div class="dropdown-content">
                    <div class="dropdown-profile-content dropdown-content-container">
                        <span class="dropdown-profile-name">{{Auth::user()->name}}</span>
                        <span class="dropdown-profile-email">{{Auth::user()->email}}</span>
                    </div>
                    <span class="separator"></span>
                    <ul class="list hover-list">
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <span class="icon fa fa-dashboard"></span> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('account.show') }}">
                                <span class="icon fa fa-user"></span> My account
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="icon fa fa-sign-out"></span> Log out
                            </a>
                        </li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <div class="clearfix"></div>
                    </ul>
                    <div class="button-row dropdown-content-container">

                        <div class="clearfix"></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
