<ul class="row list-unstyled">
    @foreach($accounts as $account)
        <li class="col-lg-4">
            <div class="card card-profile mb-4">
                <div class="card-header bg-danger"></div>
                <div class="card-block">
                    <a href="{{ route('profile', [$account->name]) }}">
                        <img class="avatar card-profile-img" src="{{ $account->profile->avatar }}">
                    </a>

                    <button class="btn btn-outline-primary btn-sm float-right">
                        <span class="icon icon-add-user"></span> Follow
                    </button>

                    <strong class="card-title d-block">
                        <a class="text-inherit" href="{{ route('profile', [$account->name]) }}">
                            {{ $account->profile->name }}
                        </a>
                    </strong>

                    <p class="mb-4">{{ $account->profile->description }}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
