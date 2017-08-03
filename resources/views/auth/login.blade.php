@extends('layouts.auth')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="offset-lg-3 col-lg-6">
                <section class="card mb-4">
                    <div class="card-header" style="background-color: white">
                        <h1>ログイン</h1>
                    </div>

                    <div class="card-block">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group row {{ $errors->has('login') ? ' has-error' : '' }}">
                                <div class="offset-2 col-8">
                                    <input name="login" type="text" class="form-control"
                                           value="{{ old('login') }}" placeholder="Username or E-Mail" required autofocus>

                                    @if ($errors->has('login'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="offset-2 col-8">
                                    <input name="password" type="password" class="form-control" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="offset-2 col-8">
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
                                <div class="offset-2 col-8">
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
