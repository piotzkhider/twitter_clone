@extends('layouts.app')

@section('content')
    <div class="col-lg-3">
        <div class="card card-profile mb-4">
            <div class="card-header bg-danger"></div>
            <div class="card-block text-center">
                <a href="#">
                    <img class="avatar card-profile-img" src="{{ $me->avatar }}">
                </a>

                <div class="card-title my-2">
                    <a class="font-weight-bold text-inherit d-block"
                       href="{{ route('profile', [$me->username]) }}">{{ $me->name }}</a>
                    &#64;{{ $me->username }}
                </div>

                @if($me->description)
                    <p class="mb-4">{{ $me->description }}</p>
                @endif

                <ul class="card-profile-stats">
                    <li class="card-profile-stat">
                        <a href="{{ route('profile.friends', [$me->username]) }}" class="text-inherit">
                            Friends
                            <strong class="d-block">{{ $me->friends->count() }}</strong>
                        </a>
                    </li>
                    <li class="card-profile-stat">
                        <a href="{{ route('profile.followers', [$me->username]) }}" class="text-inherit">
                            Enemies
                            <strong class="d-block">{{ $me->followers->count() }}</strong>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            <li class="media list-group-item p-4 {{ $errors->has('body') ? 'has-danger' : '' }}">
                <form method="POST" action="{{ route('home') }}" class="input-group">
                    {{ csrf_field() }}

                    <input name="body" type="text" class="form-control" placeholder="Message">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-secondary">
                            <span class="icon icon-new-message"></span>
                        </button>
                    </div>
                </form>

                @if($errors->has('body'))
                    <div class="form-control-feedback">
                        <strong>{{ $errors->first('body') }}</strong>
                    </div>
                @endif
            </li>
            @each('fragments.tweet', $timeline, 'tweet')
        </ul>
    </div>

    <div class="col-lg-3">
        @include('fragments.footer')
    </div>
@endsection
