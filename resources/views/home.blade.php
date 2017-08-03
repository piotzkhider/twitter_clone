@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-profile mb-4">
                    <div class="card-header bg-danger"></div>
                    <div class="card-block text-center">
                        <a href="#">
                            <img class="card-profile-img" src="{{ $user->avatar }}">
                        </a>

                        <div class="card-title my-2">
                            <a class="font-weight-bold text-inherit d-block" href="#">{{ $user->name }}</a>
                            &#64;{{ $user->username }}
                        </div>

                        @if($user->description)
                            <p class="mb-4">{{ $user->description }}</p>
                        @endif

                        <ul class="card-profile-stats">
                            <li class="card-profile-stat">
                                <a href="#" class="text-inherit">
                                    Friends
                                    <strong class="d-block">{{ $user->friends->count() }}</strong>
                                </a>
                            </li>
                            <li class="card-profile-stat">
                                <a href="#" class="text-inherit">
                                    Enemies
                                    <strong class="d-block">{{ $user->followers->count() }}</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <ul class="list-group media-list-stream mb-4">
                    <li class="media list-group-item p-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Message">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-secondary">
                                    <span class="icon icon-new-message"></span>
                                </button>
                            </div>
                        </div>
                    </li>
                    @foreach($tweets as $tweet)
                        <li class="media list-group-item p-4">
                            @include('pieces.tweet', ['tweet' => $tweet])
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3">
                @include('pieces.footer')
            </div>
        </div>
    </div>
@endsection
