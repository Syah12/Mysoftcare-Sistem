<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>
        <div>{{ __('Pengurusan Projek') }}</div>
    </x-slot>

    <div class="pt-6">
        <livewire:project-management.tables.project-management-table />
    </div>
</x-admin-layout>
