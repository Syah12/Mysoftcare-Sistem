@props([
    'tabs' => [],
    'withLabel' => true,
    'withIcon' => true,
    'style' => 'default',
    'color' => 'slate-200',
    'shadow' => false,
    'alert'  => false,
])

@php
    $wrapperClasses = $style == 'default' ? 'border-b border-gray-300' : '';
    $buttonClasses = $style == 'default' ? 'inline-flex items-center py-2 px-4 border-b-2 rounded-t-lg hover:text-blue-700 hover:border-blue-700 gap-3' : 'inline-flex items-center gap-2 py-2 px-4 rounded';
    $activeButtonClasses = $style == 'default' ? 'border-blue-700 text-blue-900' : 'bg-blue-100 text-blue-900 border-blue-300';
    $inactiveButtonClasses = $style == 'default' ? 'hover:text-gray-900 border-transparent text-gray-500 bg-slate-100' : "bg-$color";
@endphp
@php
    $isShow = collect($tabs)->filter(fn ($item) => ($item['show'] ?? true) == false)->count() == 0;
@endphp
<div {{ $attributes->merge(['class' => 'space-y-6']) }}>
    @if ($isShow)
        <ul class="flex flex-wrap -mb-px gap-2 {{ $wrapperClasses }} sm:text-base text-sm gap-2">
            @foreach ($tabs as $key => $item)
                @if ($item['show'] ?? true)
                    <li class="relative">
                        <button type="button" title="{{ $item['label'] }}"
                                x-bind:class="currentTab == @js($key) ? '{{ $activeButtonClasses }}' : '{{ $inactiveButtonClasses }}'"
                                @click.prevent="currentTab = '{{ $key }}'" x-ref="{{ $key }}"
                                @class([
                                    $buttonClasses,
                                    'shadow-md' => $shadow
                                ])
                                aria-current="page">
                            @if ($withIcon)
                                <x-dynamic-component component="{{ $item['icon'] }}" class="w-5 h-5" />
                            @endif
                            @if ($withLabel)
                                {{ $item['label'] }}
                            @endif
                            @if (array_key_exists('alert', $item) ? $item['alert'] : false)
                                <span class="absolute -right-1 -top-1 flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-yellow-500"></span>
                                </span>
                            @endif
                        </button>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
    {{ $slot }}
</div>
