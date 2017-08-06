<ul class="row list-unstyled">
    @foreach($users as $user)
        <li class="col-lg-4">
            <div class="card card-profile mb-4">
                <div class="card-header bg-danger"></div>
                <div class="card-block">
                    <a href="{{ route('user', [$user->url_name]) }}">
                        <img class="avatar card-profile-img" src="{{ $user->avatar }}">
                    </a>

                    <button class="btn btn-outline-primary btn-sm float-right">
                        <span class="icon icon-add-user"></span> Follow
                    </button>

                    <strong class="card-title d-block">
                        <a class="text-inherit" href="{{ route('user', [$user->url_name]) }}">
                            {{ $user->display_name }}
                        </a>
                    </strong>

                    <p class="mb-4">{{ $user->description }}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
