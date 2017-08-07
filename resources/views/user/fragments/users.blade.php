<ul class="row list-unstyled card-columns">
    @foreach($users as $user)
        <li class="col-xl-4 col-md-6">
            <div class="card card-profile mb-4">
                <div class="card-header bg-danger"></div>
                <div class="card-block">
                    <a href="{{ route('user', [$user->url_name]) }}">
                        <img class="avatar card-profile-img" src="{{ asset($user->avatar) }}">
                    </a>

                    <span class="float-right">
                        @include('fragments.friendship.small')
                    </span>

                    <strong class="card-title d-block">
                        <a class="text-inherit" href="{{ route('user', [$user->url_name]) }}">
                            {{ $user->display_name }}
                        </a>
                    </strong>

                    <p class="lineclamp">{{ $user->description }}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
