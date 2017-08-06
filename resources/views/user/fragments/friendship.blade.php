@unless($me->equals($user))
    <div class="card mb-4">
        <div class="card-block">
            <h6 class="card-title">Friendship</h6>
            @include('fragments.friendship.middle')
        </div>
    </div>
@endunless
