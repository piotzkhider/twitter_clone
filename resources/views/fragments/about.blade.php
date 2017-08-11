<div class="card mb-4">
    <div class="card-block">
        <h6 class="card-title">
            About
            @if($me->equals($user))
                <small>· <a href="{{ route('settings.profile') }}">Edit</a></small>
            @endif
        </h6>
        <ul class="list-unstyled ayn">
            @if($user->link)
                <li class="mb-1"><span class="text-muted icon icon-link mr-3"></span>
                    <a href="{{ $user->link }}">https://www.asia-quest.jp/</a>
                </li>
            @endif
            @if($user->organization)
                <li class="mb-1"><span class="text-muted icon icon-users mr-3"></span>
                    {{ $user->organization }}東京大学
                </li>
            @endif
            @if($user->address)
                <li class="mb-1"><span class="text-muted icon icon-location-pin mr-3"></span>
                    {{ $user->address }}名古屋
                </li>
            @endif
        </ul>
    </div>
</div>
