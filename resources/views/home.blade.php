@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="flex flex-col items-center mb-10 mt-4">
                <h1 class="font-bold text-4xl mb-4">Welcome to the CookBook</h1>
                <p class="text-lg">The marvellous place to do stuff.</p>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="text-xl mb-4">Discover our feed...</h2>
                <div>
                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <x-post :post="$post" />
                        @endforeach

                        {{ $posts->links('pagination::tailwind') }}
                    @else
                        <p>There are no posts</p>
                    @endif
                </div>
            </div>
            <div class="bg-white">
                <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                    <h2 class="sr-only">Products</h2>
                    <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @if ($meals->count())
                            @foreach ($meals as $meal)
                                <x-meal :meal="$meal" />
                            @endforeach

                            {{ $meals->links('pagination::tailwind') }}
                        @else
                            <p>There are no meals</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
