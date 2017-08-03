@extends('layouts.profile')

@section('content')
    <div class="col-lg-6">
        <ul class="list-group media-list-stream mb-4">
            <li class="media list-group-item p-4">
                <div class="media-body">
                    <strong>Profile</strong>
                </div>
            </li>
            <li class="media list-group-item p-4">
                <div class="media-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Name</label>
                            <div class="col-10">
                                <input class="form-control" type="text" value="Artisanal Kale">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Avatar</label>
                            <div class="col-10">
                                <input type="file" class="form-control-file">
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
