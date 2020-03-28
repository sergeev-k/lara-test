@extends('layouts.app')

@section('content')
    <div id="app">
        <App></App>
    </div>
@endsection

@push('script')
    <script src="{{ asset('/js/manifest.js') }}"></script>
    <script src="{{ asset('/js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
