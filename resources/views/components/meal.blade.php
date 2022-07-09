@props(['meal' => $meal])

<div class="shadow-md hover:shadow-xl p-2 rounded-lg bg-gray-50">
    <div>
        <div
            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-1 xl:aspect-h-1 h-fit">
            <img src="{{ asset('images/' . $meal->image_path) }}" class="h-auto">
        </div>

        <a href="{{ route('users.meal', $meal->user) }}" class="mt-4 text-sm font-semibold underline text-gray-700">Chef
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


{{-- <div class="group relative shadow-sm hover:shadow-lg rounded p-2 bg-gray-50">
    <div
        class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
        <img src="{{ asset('images/' . $meal->image_path) }}" alt="meal image"
            class="w-full h-full object-center object-cover lg:w-full lg:h-full">
    </div>
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-sm text-gray-700">
                <a href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {{ $meal->title }}
                </a>
            </h3>
            <p class="mt-1 text-sm text-gray-500">{{ $meal->description }}</p>
        </div>
        <p class="text-sm font-medium text-gray-900">${{ $meal->price }}</p>
    </div>
    @can('deleteMeal', $meal)
        <form action="{{ route('meals.destroy', $meal) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan
</div> --}}
