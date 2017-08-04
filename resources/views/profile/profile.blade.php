@extends('layouts.profile')

@section('secondary-content')
    <div class="col-lg-3">
        @includeWhen(! Auth::user()->equals($user), 'profile.pieces.friendship')
    </div>

    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            @foreach($user->tweets as $tweet)
                <li class="media list-group-item p-4">
                    @include('pieces.tweet')
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-lg-3">
        @include('pieces.footer')
    </div>
@endsection
