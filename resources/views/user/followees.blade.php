@extends('layouts.user', ['me' => Auth::user(), 'tweets' => $user->tweets, 'followees' => $user->followees, 'followers' => $user->followers])

@section('content')
    <div class="col-lg-3">
        @unless(Auth::user()->equals($user))
            @include('user.fragments.friendship')
        @endunless

        @include('fragments.footer')
    </div>

    <div class="col-lg-9">
        @include('user.fragments.users', ['users' => $user->followees])
    </div>
@endsection
