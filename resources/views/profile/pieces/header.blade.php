<div class="profile-header" style="background-image: url({{ asset('images/iceland.jpg') }})">
    <div class="container">
        <div class="container-inner">
            <img class="rounded-circle media-object" src="{{ asset('images/no-thumb.png') }}">
            <h3 class="profile-header-user">Dave Gamache</h3>
            <p class="profile-header-bio">
                I wish i was a little bit taller, wish i was a baller, wish i had a girl… also.
            </p>
        </div>
    </div>

    <nav class="profile-header-nav">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item active">
                <a href="{{ route('profile') }}" class="nav-link">
                    Messages
                    <strong class="d-block">282</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('friends') }}" class="nav-link">
                    Friends
                    <strong class="d-block">9</strong>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Enemies
                    <strong class="d-block">8</strong>
                </a>
            </li>
        </ul>
    </nav>
</div>

