@extends('layouts.profile')

@section('content')
    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            <li class="media list-group-item p-4">
                <div class="media-body">
                    <strong>Account</strong>
                </div>
            </li>
            <li class="media list-group-item p-4">
                <div class="media-body">
                    <form>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-4 col-form-label">名前</label>
                            <div class="col-8">
                                <input class="form-control" type="text" value="artisanal_kale">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                                <input class="form-control" type="email" value="bootstrap@example.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-4 col-form-label">パスワード</label>
                            <div class="col-8">
                                <input class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-4 col-form-label">Confirm
                                パスワード</label>
                            <div class="col-8">
                                <input class="form-control" type="password">
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
