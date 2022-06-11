@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-meal :meal="$meal" />
        </div>
    </div>
@endsection
