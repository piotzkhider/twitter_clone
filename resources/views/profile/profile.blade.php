@extends('layouts.profile')

@section('content')
    @include('profile.pieces.header', ['user' => $user])

    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('profile.pieces.friendship')
            </div>

            <div class="col-lg-6">
                <ul class="list-group media-list-stream mb-4">
                    @foreach($user->tweets as $tweet)
                        <li class="media list-group-item p-4">
                            @include('pieces.tweet', ['tweet' => $tweet])
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3">
                @include('pieces.footer')
            </div>
        </div>
    </div>
@endsection

