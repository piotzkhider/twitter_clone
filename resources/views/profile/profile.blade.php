@extends('layouts.app')

@section('content')
    @include('profile.pieces.header')

    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('profile.pieces.friendship')

                @include('pieces.about')
            </div>

            <div class="col-lg-6">
                @include('pieces.timeline')
            </div>

            <div class="col-lg-3">
                @include('pieces.footer')
            </div>
        </div>
    </div>
@endsection

