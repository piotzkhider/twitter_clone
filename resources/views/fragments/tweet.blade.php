<li class="media list-group-item p-4">
    <article class="d-flex w-100">
        <a class="font-weight-bold text-inherit d-block"
           href="{{ route('user', [$tweet->user->url_name]) }}">
            <img class="media-object d-flex align-self-start mr-3" src="{{ $tweet->user->avatar }}">
        </a>
        <div class="media-body">
            <div class="mb-2">
                <time class="float-right small text-muted">{{ $tweet->created_at }}</time>
                <a class="font-weight-bold text-inherit d-block"
                   href="{{ route('user', [$tweet->user->url_name]) }}">
                    <strong>{{ $tweet->user->display_name }}</strong>
                </a>
            </div>

            <p>{{ $tweet->body }}</p>
        </div>
    </article>
</li>
