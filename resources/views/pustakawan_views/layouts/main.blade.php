@extends('layouts.pustakawan-layout')
@section('content')
    <x-pustakawan.alert.import-error />
    <x-pustakawan.alert.success />
    <div class="card">
        <div class="card-body">
            @yield('master_data_content')
        </div>
    </div>
@endsection
