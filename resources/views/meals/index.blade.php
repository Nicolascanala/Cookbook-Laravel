@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-10/12 md:w-8/12 bg-white p-6 rounded-lg">
            @auth
            {{-- @dd(auth()->user()->hasRole()) --}}
                @if (auth()->user()->hasRole('chef'))
                    <form action="{{ route('meals') }}" method="post" class="mb-4" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <h2 class="font-bold text-xl p-1">Add a meal</h2>
                        </div>

                        {{-- Meal name --}}
                        <div class="mb-4">
                            <label for="title" class="sr-only">Title</label>
                            <input name="title" id="title"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror"
                                placeholder="Meal Title" />

                            @error('title')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Meal description --}}
                        <div class="mb-4">
                            <label for="description" class="sr-only">Description</label>
                            <textarea name="description" id="description" cols="30" rows="4"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                                placeholder="Meal Description"></textarea>

                            @error('description')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Meal price --}}
                        <div class="mb-4">
                            <label for="price" class="sr-only">Price</label>
                            <input name="price" id="price"
                                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror"
                                placeholder="Meal price" />

                            @error('price')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Meal Image --}}
                        <div class="mb-4 flex flex-col">
                            <label for="image" class="font-bold p-1">Add image</label>
                            <input type="file" class="bg-gray-100 border-2 w-full p-4 rounded-lg" required name="image">
                        </div>

                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                        </div>
                    </form>
                @endif
            @endauth

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
