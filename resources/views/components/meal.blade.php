@props(['meal' => $meal])

{{-- <div class="mb-4">
    <a href="{{ route('users.post', $meal->user) }}" class="font-bold">{{ $meal->user->name }}</a>
    <span class="text-gray-600 text-sm">{{ $meal->created_at->diffForHumans() }}</span> --}}

{{-- <div class="p-6 bg-gray-100 flex flex-col"> --}}
{{-- <div class="p-6 bg-gray-100 grid grid-cols-4 gap-4 ">
        <div class="w-1/3">
            <h1>{{ $meal->title }}</h1>
        </div>
        <div class="w-1/3">
            <p>{{ $meal->description }}</p>
        </div>
        <div class="w-1/3">
            <p>{{ $meal->price }}</p>
        </div>
    </div> --}}

{{-- @can('deleteMeal', $meal)
        <form action="{{ route('meals.destroy', $meal) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan --}}
{{-- </div> --}}


{{-- <div class="flex items-center">
    <a href="{{ route('users.post', $meal->user) }}" class="font-bold">{{ $meal->user->name }}</a>
    <span class="text-gray-600 text-sm">{{ $meal->created_at->diffForHumans() }}</span>
</div> --}}

<div class="shadow-md hover:shadow-xl p-2 rounded-lg bg-gray-50">

    <div>
        {{-- <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8"> --}}
        <div
            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-1 xl:aspect-h-1 h-fit">
            <img src="{{ asset('images/' . $meal->image_path) }}" class="h-auto">
        </div>

        <a href="{{ route('users.meal', $meal->user) }}"
            class="mt-4 text-sm font-semibold underline text-gray-700">Chef
            {{ $meal->user->name }}</a>
        <p class="mt-1 text-lg font-medium text-gray-900">{{ $meal->title }}</p>
        <p class="mt-1 text-lg font-medium text-gray-900">{{ $meal->price }}</p>

        @can('deleteMeal', $meal)
            <form action="{{ route('meals.destroy', $meal) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        @endcan

    </div>
</div>
