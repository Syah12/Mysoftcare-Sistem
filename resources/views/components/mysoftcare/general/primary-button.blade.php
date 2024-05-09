@props(['name', 'wireClick' => false, 'class'])

<button class="{{ $class }} py-2 px-4 rounded-lg" wire:click="{{ $wireClick }}">{{ $name }}</button>
