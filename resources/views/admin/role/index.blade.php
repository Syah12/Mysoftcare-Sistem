<x-admin-layout>
    <x-slot name="breadcrumb">
        <h2 class="font-medium py-2">
            {{ __('Peranan') }}
        </h2>
    </x-slot>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-4">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>
        </h2>
        <p>Hi, {{ Auth::user()->name }}.</p>
    </x-slot>

    <div class="mt-4">
        {{-- <livewire:employee.tables.employee-table /> --}}
    </div>
</x-admin-layout>
