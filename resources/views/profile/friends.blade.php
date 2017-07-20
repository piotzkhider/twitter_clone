@extends('layouts.app')

@section('content')
    @include('profile.pieces.header')

    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('profile.pieces.friendship')

                @include('pieces.about')

                @include('pieces.footer')
            </div>

            <div class="col-lg-9">
                @include('profile.pieces.users')
            </div>
        </div>
    </div>
@endsection

