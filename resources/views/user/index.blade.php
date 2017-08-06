@extends('layouts.user', ['me' => Auth::user(), 'tweets' => $timeline, 'following' => $user->following, 'followers' => $user->followers])

@section('content')
    <div class="col-lg-3">
        @unless(Auth::user()->equals($user))
            @include('user.fragments.friendship')
        @endunless
    </div>

    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            @each('fragments.tweet', $timeline, 'tweet')
        </ul>
    </div>

    <div class="col-lg-3">
        @include('fragments.footer')
    </div>
@endsection