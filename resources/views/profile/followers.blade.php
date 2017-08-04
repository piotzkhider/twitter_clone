@extends('layouts.profile', ['me' => Auth::user(), 'tweets' => $account->tweets, 'friends' => $account->friends, 'followers' => $account->followers])

@section('content')
    <div class="col-lg-3">
        @includeWhen(Auth::user()->notEquals($account), 'profile.fragments.friendship')

        @include('fragments.footer')
    </div>

    <div class="col-lg-9">
        @include('profile.fragments.accounts', ['accounts' => $account->followers])
    </div>
@endsection
