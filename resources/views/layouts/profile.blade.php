@extends('layouts.app')

@section('content')
    @include('profile.pieces.header')

    <div class="container pt-4">
        <div class="row">
            @yield('content')
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('nav.profile-header-nav a[href="' + location.href + '"]').parent().addClass('active');
    });
</script>
@endpush