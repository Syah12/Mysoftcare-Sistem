<x-admin-layout>
    <x-slot name="breadcrumb">
        <h2 class="font-medium py-2">
            {{ __('Jadual Bertugas') }}
        </h2>
    </x-slot>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-4">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>
        </h2>
        <p>Hi, {{ Auth::user()->name }}.</p>
    </x-slot>

    <livewire:duty.pages.index-page />
    <livewire:duty.partials.generate-duty />
</x-admin-layout>
