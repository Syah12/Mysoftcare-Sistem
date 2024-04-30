<x-admin-layout>
    <x-slot name="breadcrumb">
        <h2 class="font-medium py-2">
            {{ __('Kalendar') }}
        </h2>
    </x-slot>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-4">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>
        </h2>
        <p>Hi, {{ Auth::user()->name }}.</p>
    </x-slot>

    <div class="mt-4">
        <livewire:calendar.modals.form-modal />
        <livewire:calendar.libraries.full-calendar-view />
    </div>
</x-admin-layout>
