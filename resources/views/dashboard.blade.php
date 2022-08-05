@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <h1 class="text-2xl font-bold">Dashboard</h1>

            <div class="my-10">

                <h2 class="text-xl font-semibold">My meals</h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 my-6">
                    @if ($meals->count())
                        @foreach ($meals as $meal)
                            <x-meal :meal="$meal" />
                        @endforeach

                    @else
                        <p>There are no meals</p>
                    @endif
                </div>
            </div>

            <hr>

            <div class="my-10">

                <h2 class="text-xl font-semibold">My posts</h2>

                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8 my-6">
                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <x-post :post="$post" />
                        @endforeach

                    @else
                        <p>There are no meals</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
