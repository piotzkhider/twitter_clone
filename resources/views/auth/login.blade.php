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

                            <div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="offset-2 col-8">
                                    <input name="email" type="text" value="{{ old('email') }}"
                                           class="form-control form-control-danger"
                                           placeholder="E-Mail" required autofocus>

                                    @if ($errors->has('email'))
                                        <div class="form-control-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="offset-2 col-8">
                                    <input name="password" type="password" class="form-control form-control-danger"
                                           placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <div class="form-control-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
