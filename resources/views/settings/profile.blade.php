@extends('layouts.settings')

@section('content')
    <div class="col-lg-3">
        @include('settings.fragments.profile')

        @include('settings.fragments.nav')
    </div>

    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            <li class="media list-group-item p-4">
                <div class="media-body">
                    <strong>Profile</strong>
                </div>
            </li>
            <li class="media list-group-item p-4">
                <div class="media-body">
                    <form method="POST" action="{{ route('settings.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">表示名</label>
                            <div class="col-10">
                                <input name="name" type="text" id="name" class="form-control" value="{{ $me->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-2 col-form-label">アバター</label>
                            <div class="col-10">
                                <img src="{{ $me->avatar }}" class="avatar">
                                <input name="avatar" type="file" id="avatar" class="form-control-file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-2 col-10">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
@endsection
