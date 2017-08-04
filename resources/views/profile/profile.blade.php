@extends('layouts.profile', ['me' => Auth::user(), 'friends' => $user->friends, 'followers' => $user->followers])

@section('content')
        <div class="col-lg-3">
            @includeWhen(Auth::user()->notEquals($user), 'profile.fragments.friendship')
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
