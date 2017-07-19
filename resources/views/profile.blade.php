@extends('layouts.auth')

@section('content')
    <div class="profile-header" style="background-image: url({{ asset('images/iceland.jpg') }})">
        <div class="container">
            <div class="container-inner">
                <img class="rounded-circle media-object" src="{{ asset('images/no-thumb.png') }}">
                <h3 class="profile-header-user">Dave Gamache</h3>
                <p class="profile-header-bio">
                    I wish i was a little bit taller, wish i was a baller, wish i had a girl… also.
                </p>
            </div>
        </div>

        <nav class="profile-header-nav">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        Messages
                        <strong class="d-block">282</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Friends
                        <strong class="d-block">9</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Enemies
                        <strong class="d-block">8</strong>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-block">
                        <h6 class="mb-3">
                            About
                            <small>· <a href="#">Edit</a></small>
                        </h6>
                        <ul class="list-unstyled ayn">
                            <li><span class="text-muted icon icon-calendar mr-3"></span>Went to <a href="#">Oh,
                                    Canada</a>
                            <li><span class="text-muted icon icon-users mr-3"></span>Became friends with <a href="#">Obama</a>
                            <li><span class="text-muted icon icon-github mr-3"></span>Worked at <a href="#">Github</a>
                            <li><span class="text-muted icon icon-home mr-3"></span>Lives in <a href="#">San Francisco,
                                    CA</a>
                            <li><span class="text-muted icon icon-location-pin mr-3"></span>From <a href="#">Seattle,
                                    WA</a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <ul class="list-group media-list media-list-stream mb-4">

                    <li class="media list-group-item p-4">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Message">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-secondary">
                                    <span class="icon icon-camera"></span>
                                </button>
                            </div>
                        </div>
                    </li>

                    <li class="media list-group-item p-4">
                        <article class="d-flex">
                            <img class="media-object d-flex align-self-start mr-3"
                                 src="{{ asset('images/no-thumb.png') }}">
                            <div class="media-body">
                                <div class="mb-2">
                                    <time class="float-right small text-muted">4 min</time>
                                    <strong>Dave Gamache</strong>
                                </div>

                                <p>
                                    Aenean lacinia bibendum nulla sed consectetur. Vestibulum id ligula porta felis
                                    euismod
                                    semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo
                                    odio,
                                    dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod
                                    semper.
                                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                    mus.
                                </p>
                            </div>
                        </article>
                    </li>

                    <li class="media list-group-item p-4">
                        <article class="d-flex">
                            <img class="media-object d-flex align-self-start mr-3"
                                 src="{{ asset('images/no-thumb.png') }}">
                            <div class="media-body">
                                <div class="mb-2">
                                    <time class="float-right small text-muted">12 min</time>
                                    <strong>Jacob Thornton</strong>
                                </div>
                                <p>
                                    Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante
                                    venenatis
                                    dapibus posuere velit aliquet. Cum sociis natoque penatibus et magnis dis
                                    parturient
                                    montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac,
                                    vestibulum
                                    at
                                    eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                        </article>
                    </li>

                    <li class="media list-group-item p-4">
                        <article class="d-flex">
                            <img class="media-object d-flex align-self-start mr-3"
                                 src="{{ asset('images/no-thumb.png') }}">
                            <div class="media-body">
                                <div class="mb-2">
                                    <time class="float-right small text-muted">34 min</time>
                                    <strong>Mark Otto</strong>
                                </div>

                                <p>
                                    Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                                    euismod
                                    semper. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis
                                    vestibulum.
                                    Etiam
                                    porta sem malesuada magna mollis euismod. Donec sed odio dui.
                                </p>
                            </div>
                        </article>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3">
                <div class="card card-link-list">
                    <div class="card-block">
                        &copy; AsiaQuest Co., Ltd
                        <a href="#">About</a>
                        <a href="#">Help</a>
                        <a href="#">Terms</a>
                        <a href="#">Privacy</a>
                        <a href="#">Cookies</a>
                        <a href="#">Ads </a>
                        <a href="#">Info</a>
                        <a href="#">Brand</a>
                        <a href="#">Blog</a>
                        <a href="#">Status</a>
                        <a href="#">Apps</a>
                        <a href="#">Jobs</a>
                        <a href="#">Advertise</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

