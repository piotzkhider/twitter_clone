@extends('layouts.auth')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <section class="card mb-4">
                    <div class="card-header" style="background-color: white">
                        <h1>ログイン</h1>
                    </div>

                    <div class="card-block">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-4 col-form-label text-right">メールアドレス</label>
                                <div class="col-6">
                                    <input name="email" id="email" type="email" class="form-control"
                                           value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-4 col-form-label text-right">パスワード</label>
                                <div class="col-6">
                                    <input name="password" id="password" type="password" class="form-control" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input name="remember" type="checkbox"
                                                   class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                            ログインを継続する
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6 offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        ログイン
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        パスワードを忘れた時
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
