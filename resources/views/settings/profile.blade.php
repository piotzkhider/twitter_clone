@extends('layouts.settings')

@section('content')
    <div class="col-lg-3">
        @include('settings.fragments.profile')

        @include('settings.fragments.nav')

        <div class="hidden-md-down">
            @include('fragments.footer')
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header" style="background-color: #FFFFFF;">
                <strong>プロフィール</strong>
            </div>
            <div class="card-block">
                <form method="POST" action="{{ route('settings.profile') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group row {{ $errors->has('display_name') ? ' has-danger' : '' }}">
                        <label for="display_name" class="col-3 col-form-label">表示名</label>
                        <div class="col-9">
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
                        <label for="avatar" class="col-3 col-form-label">アバター</label>
                        <div class="col-9">
                            <img src="{{ asset($me->avatar) }}" class="avatar">
                            <input name="avatar" type="file" id="avatar" class="form-control-file">

                            @if ($errors->has('avatar'))
                                <div class="form-control-feedback">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-3 col-9">
                            <button type="submit" class="btn btn-success mt-4">保存する</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden-lg-up">
            @include('fragments.footer')
        </div>
    </div>
@endsection
