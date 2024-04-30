@props(['route', 'icon', 'name', 'active'])

{{-- @if (auth()->user()->hasRole($roles)) --}}
    <div class="mb-4">
        <a href="{{ route($route) }}">
            <div
                class="text-white hover:bg-blue-500 hover:text-white py-2 px-4 rounded-xl {{ $active ? 'bg-blue-500 text-white' : '' }}">
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
{{-- @endif --}}
