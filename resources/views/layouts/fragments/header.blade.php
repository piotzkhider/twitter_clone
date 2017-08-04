<div class="profile-header" style="background-image: url({{ asset('images/iceland.jpg') }})">
    <div class="container">
        <div class="container-inner">
            <img class="rounded-circle media-object" src="{{ $account->profile->avatar }}">
            <h3 class="profile-header-user">{{ $account->profile->name }}</h3>
            @if($account->profile->description)
                <p class="profile-header-bio">{{ $account->profile->description }}</p>
            @endif
        </div>
    </div>

    <nav class="profile-header-nav" id="profile-header">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a href="{{ route('profile', [$account->name]) }}" class="nav-link">
                    Messages
                    <strong class="d-block">{{ $tweets->count() }}</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.friends', [$account->name]) }}" class="nav-link">
                    Friends
                    <strong class="d-block">{{ $friends->count() }}</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.followers', [$account->name]) }}" class="nav-link">
                    Enemies
                    <strong class="d-block">{{ $followers->count() }}</strong>
                </a>
            </li>
        </ul>
    </nav>
</div>

