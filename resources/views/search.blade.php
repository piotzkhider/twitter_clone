@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-link-list mb-4">
                    <div class="card-block">
                        <h6 class="card-title">Search</h6>
                        gold, first, aspect
                    </div>
                </div>

                @include('pieces.footer')
            </div>

            <div class="col-lg-6">
                <ul class="list-group media-list media-list-stream mb-4">
                    @forelse(range(1, 5) as $index)
                        <li class="media list-group-item p-4">
                            @include('pieces.tweet')
                        </li>
                    @empty
                        <li class="media list-group-item p-4">
                            <article class="d-flex w-100">
                                gold, first, aspect　の検索結果はありません
                            </article>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
