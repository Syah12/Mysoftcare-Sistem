@props(['route', 'img', 'name', 'description', 'value'])

<a href="{{ route($route) }}" class="bg-blue-50 p-4 rounded-lg shadow-md">
    <div class="flex flex-row items-center gap-6">
        <div>
            <img src="{{ $img }}" class="w-20" alt="">
        </div>
        <div>
            <div class="font-medium text-lg">
                {{ $name }}
            </div>
            <div class="text-xs text-gray-700 mb-2">
                {{ $description }}
            </div>
            <div class="font-medium text-4xl">
                {{ $value }}
            </div>
        </div>
    </div>
</a>
