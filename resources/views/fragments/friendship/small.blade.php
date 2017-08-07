@if($me->isFollowingWith($user))
    <form action="{{ route('unfollow', [$user->url_name]) }}" method="POST">
        {{ csrf_field() }}

        <button type="submit" class="btn btn-outline-danger btn-sm following" style="width: 6rem;">
            <span>フォロー中</span>
            <span>解除</span>
        </button>
    </form>
@else
    <form action="{{ route('follow', [$user->url_name]) }}" method="POST">
        {{ csrf_field() }}

        @unless($me->equals($user))
            <button type="submit" class="btn btn-outline-primary btn-sm">フォローする</button>
        @endunless
    </form>
@endif
