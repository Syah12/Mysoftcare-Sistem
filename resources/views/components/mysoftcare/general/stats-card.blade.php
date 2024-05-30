@props(['route' => false, 'colour', 'name', 'value'])

<a href="{{ $route }}" class="{{ $colour }} p-4 rounded-lg border border-gray-200 hover:bg-blue-50">
    <div class="flex flex-row items-center gap-6">
        <div>
            {{ $slot }}
        </div>
        <div>
            <div class="text-gray-500 mb-1">
                {{ $name }}
            </div>
            <div class="font-medium text-4xl">
                {{ $value }}
            </div>
        </div>
        <div class="ml-auto text-end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z"
                    clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</a>
