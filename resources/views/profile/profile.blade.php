@extends('layouts.profile')

@section('content')
    @include('profile.pieces.header')

    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('profile.pieces.friendship')

                @include('pieces.about')
            </div>

            <div class="col-lg-6">
                <ul class="list-group media-list media-list-stream mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <li class="media list-group-item p-4">
                            @include('pieces.tweet')
                        </li>
                    @endfor
                </ul>
            </div>

            <div class="col-lg-3">
                @include('pieces.footer')
            </div>
        </div>
    </div>
@endsection

