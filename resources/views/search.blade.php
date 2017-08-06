@extends('layouts.app', ['me' => Auth::user()])

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-link-list mb-4">
                    <div class="card-block">
                        <h6 class="card-title">Search</h6>
                        {{ $conditions }}
                    </div>
                </div>

                @include('fragments.footer')
            </div>

            <div class="col-lg-6">
                <ul class="list-group media-list-stream mb-4">
                    @forelse($timeline as $tweet)
                        @include('fragments.tweet')
                    @empty
                        <li class="media list-group-item p-4">
                            <article class="d-flex w-100">
                                {{ $conditions }}　の検索結果はありません
                            </article>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
