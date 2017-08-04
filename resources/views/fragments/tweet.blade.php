<li class="media list-group-item p-4">
    <article class="d-flex w-100">
        <img class="media-object d-flex align-self-start mr-3" src="{{ $tweet->account->profile->avatar }}">
        <div class="media-body">
            <div class="mb-2">
                <time class="float-right small text-muted">{{ $tweet->created_at }}</time>
                <strong>{{ $tweet->account->profile->name }}</strong>
            </div>

            <p>{{ $tweet->body }}</p>
        </div>
    </article>
</li>
