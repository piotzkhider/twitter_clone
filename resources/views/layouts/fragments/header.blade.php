<div class="profile-header" style="background-image: url({{ asset('images/iceland.jpg') }})">
    <div class="container">
        <div class="container-inner">
            <img class="rounded-circle media-object" src="{{ asset($user->avatar) }}">
            <h3 class="profile-header-user">{{ $user->display_name }}</h3>
            @if($user->description)
                <p class="profile-header-bio">{{ $user->description }}</p>
            @endif
        </div>
    </div>

    <nav class="profile-header-nav" id="profile-header">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a href="{{ route('user', [$user->url_name]) }}" class="nav-link">
                    Tweets
                    <strong class="d-block">{{ $tweets->count() }}</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.following', [$user->url_name]) }}" class="nav-link">
                    Following
                    <strong class="d-block">{{ $following->count() }}</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.followers', [$user->url_name]) }}" class="nav-link">
                    Followers
                    <strong class="d-block">{{ $followers->count() }}</strong>
                </a>
            </li>
        </ul>
    </nav>
</div>

