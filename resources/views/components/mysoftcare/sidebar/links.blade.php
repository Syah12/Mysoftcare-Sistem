@props(['route', 'icon', 'name', 'active'])

<div class="mb-4">
    <a href="{{ route($route) }}">
        <div
            class="text-sm hover:text-blue-400 py-2 {{ $active ? 'text-blue-400' : 'text-white' }}">
            <div class="flex flex-row items-center gap-4">
                <div>
                    {!! $icon !!}
                </div>
                <div>
                    {{ $name }}
                </div>
            </div>
        </div>
    </a>
</div>
