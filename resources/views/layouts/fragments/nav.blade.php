<nav class="navbar navbar-toggleable-sm fixed-top navbar-inverse bg-danger">
    <div class="container">
        <button
                class="navbar-toggler navbar-toggler-right hidden-md-up"
                type="button"
                data-toggle="collapse"
                data-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand hidden-md-up" href="{{ route('home') }}">Laratweet</a>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li>
                    <a class="nav-link" href="{{ route('home') }}">
                        <span class="icon icon-home"></span> Home
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('user', [$me->url_name]) }}">
                        <span class="icon icon-user"></span> Profile
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li class="hidden-md-up">
                    <a class="nav-link" href="{{ route('settings.account') }}">
                        <span class="icon icon-cog"></span> 設定
                    </a>
                </li>
                <li class="hidden-md-up">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="icon icon-log-out"></span> ログアウト
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>

            <form action="{{ route('search') }}" method="POST" class="form-inline float-right hidden-sm-down">
                {{ csrf_field() }}

                <span {{ $errors->has('search') ? 'has-danger' : '' }}>
                    <input name="search" type="text" class="form-control form-search" placeholder="Search">
                </span>
            </form>

            <ul class="nav navbar-nav hidden-sm-down">
                <li class="nav-item nav-account dropdown">
                    <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img class="rounded-circle" src="{{ $me->avatar }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{ route('settings.account') }}">
                            <span class="icon icon-cog"></span> 設定
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="icon icon-log-out"></span> ログアウト
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>