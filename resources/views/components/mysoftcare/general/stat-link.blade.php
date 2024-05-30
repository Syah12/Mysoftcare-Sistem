@props(['name', 'value', 'route'])

<div>
    {{ $name }} ( <span
        class="font-bold text-amber-500 bg-amber-100 px-2 py-1 rounded-lg">{{ $value }}</span> )
</div>
<div>
    <a href="{{ route($route) }}" class="text-blue-500">Lihat</a>
</div>
