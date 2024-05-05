@props(['name', 'wireClick' => false])

<button class="bg-blue-500 text-white py-2 px-4 rounded-lg" wire:click="{{ $wireClick }}">{{ $name }}</button>
