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

    <div class="py-4">
        <livewire:company-status.pages.index-page />

        <div class="grid grid-cols-2 gap-6">
            <x-mysoftcare.general.stats-card route="employee.index" img="{{ asset('img/new-employee.png') }}"
                name="Bilangan Pekerja" description="Klik di sini untuk pergi ke halaman pekerja"
                value="{{ $employeesCount }}" />
            <x-mysoftcare.general.stats-card route="attendance.index" img="{{ asset('img/attendance.png') }}"
                name="Bilangan Kehadiran" description="Klik di sini untuk pergi ke halaman kehadiran" value="0" />
        </div>
    </div>
</x-admin-layout>
