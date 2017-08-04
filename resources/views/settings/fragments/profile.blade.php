<div class="card card-profile mb-4">
    <div class="card-header bg-danger"></div>
    <div class="card-block text-center">
        <a href="#">
            <img class="avatar card-profile-img" src="{{ $me->avatar }}">
        </a>

        <div class="card-title my-2">
            <a class="font-weight-bold text-inherit d-block"
               href="{{ route('profile', [$me->username]) }}">{{ $me->name }}</a>
            &#64;{{ $me->username }}
        </div>
    </div>
</div>
