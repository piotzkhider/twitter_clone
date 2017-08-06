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
                    <strong>Account</strong>
                </div>
            </li>
            <li class="media list-group-item p-4">
                <div class="media-body">
                    <form method="POST" action="{{ route('settings.account') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">ユーザー名</label>
                            <div class="col-8">
                                <input name="username" type="text" id="username" class="form-control"
                                       value="{{ $me->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">メールアドレス</label>
                            <div class="col-8">
                                <input name="email" type="email" id="email" class="form-control"
                                       value="{{ $me->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-4 col-form-label">パスワード</label>
                            <div class="col-8">
                                <input name="password" type="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-4 col-form-label">パスワード(確認)</label>
                            <div class="col-8">
                                <input name="password_confirmation" type="password" id="password_confirmation"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
@endsection
