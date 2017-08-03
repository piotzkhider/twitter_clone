@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('settings.pieces.profile-card')

                @include('settings.pieces.nav')

                @include('pieces.footer')
            </div>

            @yield('content')
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#nav-setting').find('a[href="' + location.href + '"]').addClass('active');
    });
</script>
@endpush