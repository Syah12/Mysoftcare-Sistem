@props(['route' => false, 'name', 'icon' => false, 'disabled' => false])

<li>
    <div class="flex items-center space-x-2">
        @if ($icon)
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
        @endif
        <a href="{{ $route }}"
            class="text-sm hover:text-blue-400 @if ($disabled) pointer-events-none hover:none @endif">{{ $name }}</a>
    </div>
</li>
