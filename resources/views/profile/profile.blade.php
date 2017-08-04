@extends('layouts.profile', ['me' => Auth::user(), 'tweets' => $timeline, 'friends' => $account->friends, 'followers' => $account->followers])

@section('content')
    <div class="col-lg-3">
        @includeWhen(Auth::user()->notEquals($account), 'profile.fragments.friendship')
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
