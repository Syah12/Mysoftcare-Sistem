@props(['route', 'name', 'class'])

<a href="{{ route($route) }}" class="{{ $class }} px-4 py-2 rounded-lg">{{ $name }}</a>
