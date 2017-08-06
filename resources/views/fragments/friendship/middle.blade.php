@if($me->isFollowingWith($user))
    <form action="{{ route('unfollow', [$user->url_name]) }}" method="POST">
        {{ csrf_field() }}

        <button type="submit" class="btn btn-outline-danger btn-md">
            <span class="icon icon-add-user"></span> Unfollow
        </button>
    </form>
@else
    <form action="{{ route('follow', [$user->url_name]) }}" method="POST">
        {{ csrf_field() }}

        <button type="submit" class="btn btn-outline-primary btn-md">
            <span class="icon icon-add-user"></span> Follow
        </button>
    </form>
@endif