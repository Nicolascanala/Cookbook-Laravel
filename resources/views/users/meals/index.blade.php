@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Posted {{ $meals->count() }} {{ Str::plural('meal', $meals->count()) }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg">
                @if ($meals->count())
                    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach ($meals as $meal)
                            <x-meal :meal="$meal" />
                        @endforeach
                    </div>

                    {{ $meals->links('pagination::tailwind') }}
                @else
                    <p>{{ $user->name }} does not have any meals</p>
                @endif
            </div>
        </div>
    </div>
@endsection
