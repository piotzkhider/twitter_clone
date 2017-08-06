<div class="card card-profile mb-4">
    <div class="card-header bg-danger"></div>
    <div class="card-block text-center">
        <a href="#">
            <img class="avatar card-profile-img" src="{{ $me->profile->avatar }}">
        </a>

        <div class="card-title my-2">
            <a class="font-weight-bold text-inherit d-block"
               href="{{ route('profile', [$me->name]) }}">{{ $me->name }}</a>
            &#64;{{ $me->profile->name }}
        </div>
    </div>
</div>
