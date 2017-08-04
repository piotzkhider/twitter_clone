@extends('layouts.profile', ['me' => Auth::user(), 'tweets' => $user->tweets, 'friends' => $user->friends, 'followers' => $user->followers])

@section('content')
    <div class="col-lg-3">
        @includeWhen(Auth::user()->notEquals($user), 'profile.fragments.friendship')

        @include('fragments.footer')
    </div>

    <div class="col-lg-9">
        @include('profile.fragments.users', ['users' => $user->followers])
    </div>
@endsection
