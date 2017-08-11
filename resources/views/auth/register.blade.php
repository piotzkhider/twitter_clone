@extends('layouts.auth')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <section class="card mb-4">
                    <div class="card-header" style="background-color: white">
                        <h1>登録</h1>
                    </div>

                    <div class="card-block">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group row {{ $errors->has('url_name') ? ' has-danger' : '' }}">
                                <label for="url_name" class="col-4 col-form-label text-right">ユーザ名</label>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">&#64;</span>
                                        <input name="url_name" type="text" id="url_name"
                                               class="form-control form-control-danger"
                                               value="{{ old('url_name') }}" required autofocus>
                                    </div>

                                    @if ($errors->has('url_name'))
                                        <div class="form-control-feedback">
                                            <strong>{{ $errors->first('url_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email" class="col-4 col-form-label text-right">メールアドレス</label>
                                <div class="col-6">
                                    <input name="email" id="email" type="email" class="form-control form-control-danger"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <div class="form-control-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label for="password" class="col-4 col-form-label text-right">パスワード</label>
                                <div class="col-6">
                                    <input name="password" id="password" type="password"
                                           class="form-control form-control-danger" required>

                                    @if ($errors->has('password'))
                                        <div class="form-control-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-4 col-form-label text-right">パスワード(確認)</label>
                                <div class="col-6">
                                    <input name="password_confirmation" id="password-confirm" type="password"
                                           class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        登録
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
