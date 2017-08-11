@extends('layouts.user', ['tweets' => $user->tweets, 'following' => $user->following, 'followers' => $user->followers])

@section('content')
    <div class="col-lg-3">
        @include('user.fragments.friendship')

        <div class="hidden-md-down">
            @include('fragments.footer')
        </div>
    </div>

    <div class="col-lg-9">
        @include('user.fragments.users', ['users' => $user->following])

        <div class="hidden-lg-up">
            @include('fragments.footer')
        </div>
    </div>
@endsection
