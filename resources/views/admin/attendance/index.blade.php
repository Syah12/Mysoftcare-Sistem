<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>
        <div>{{ __('Kehadiran') }}</div>
    </x-slot>

    <div class="pt-6">
        <livewire:attendance.partials.attendance-stats />
    </div>

    <div class="pt-6">
        <livewire:attendance.tables.attendance-table />
    </div>
    
</x-admin-layout>
