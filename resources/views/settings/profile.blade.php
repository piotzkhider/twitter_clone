@extends('layouts.settings')

@section('content')
    <div class="col-lg-3">
        @include('settings.fragments.profile')

        @include('settings.fragments.nav')

        @include('fragments.footer')
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
                    <form method="POST" action="{{ route('settings.profile') }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group row {{ $errors->has('display_name') ? ' has-danger' : '' }}">
                            <label for="display_name" class="col-2 col-form-label">表示名</label>
                            <div class="col-10">
                                <input name="display_name" type="text" id="display_name" class="form-control"
                                       value="{{ $me->display_name }}">

                                @if ($errors->has('display_name'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('avatar') ? 'has-danger' : '' }}">
                            <label for="avatar" class="col-2 col-form-label">アバター</label>
                            <div class="col-10">
                                <img src="{{ $me->avatar }}" class="avatar">
                                <input name="avatar" type="file" id="avatar" class="form-control-file">

                                @if ($errors->has('avatar'))
                                    <div class="form-control-feedback">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-2 col-10">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
@endsection
