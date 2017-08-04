@extends('layouts.profile')

@section('secondary-content')
    <div class="col-lg-3">
        @includeWhen(! Auth::user()->equals($user), 'profile.pieces.friendship')

        @include('pieces.footer')
    </div>

    <div class="col-lg-9">
        @include('profile.pieces.users')
    </div>
@endsection
