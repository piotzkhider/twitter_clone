<div class="profile-header" style="background-image: url({{ asset('images/iceland.jpg') }})">
    <div class="container">
        <div class="container-inner">
            <img class="rounded-circle media-object" src="{{ $user->avatar }}">
            <h3 class="profile-header-user">{{ $user->name }}</h3>
            @if($user->description)
                <p class="profile-header-bio">{{ $user->description }}</p>
            @endif
        </div>
    </div>

    <nav class="profile-header-nav">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a href="{{ route('profile', ['user' => $user->username]) }}" class="nav-link">
                    Messages
                    <strong class="d-block">{{ $user->tweets->count() }}</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('friends') }}" class="nav-link">
                    Friends
                    <strong class="d-block">{{ $user->friends->count() }}</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Enemies
                    <strong class="d-block">{{ $user->followers->count() }}</strong>
                </a>
            </li>
        </ul>
    </nav>
</div>

