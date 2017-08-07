<div class="card card-profile mb-4">
    <div class="card-header bg-danger"></div>
    <div class="card-block text-center">
        <a href="#">
            <img class="avatar card-profile-img" src="{{ asset($me->avatar) }}">
        </a>

        <div class="card-title my-2">
            <a class="font-weight-bold text-inherit d-block"
               href="{{ route('user', [$me->url_name]) }}">{{ $me->display_name }}</a>
            &#64;{{ $me->url_name }}
        </div>
    </div>
</div>
