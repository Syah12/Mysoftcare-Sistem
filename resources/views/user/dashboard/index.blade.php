<x-admin-layout>
    <x-slot name="breadcrumb">
        <h2 class="font-medium py-2">
            {{ __('Papan Utama') }}
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
        @foreach ($companyStatus as $item)
            @if ($item->flag == false)
                kerja seperti biasa
            @else
                Cuti
                {{ $item->description }}
            @endif
        @endforeach
    </div>
</x-admin-layout>
