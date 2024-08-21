@extends('layouts.pustakawan_layout')
@section('content')
    @include('pustakawan_views.components.alert.alert-import-error')
    @include('pustakawan_views.components.alert.alert-success')
    <div class="card">
        <div class="card-body">
            @yield('master_data_content')
        </div>
    </div>
@endsection
