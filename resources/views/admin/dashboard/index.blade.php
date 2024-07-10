<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item name="Papan Utama" disabled />
        </x-mysoftcare.general.breadcrumbs>
        <h2 class="font-semibold text-2xl pt-6">
            Selamat datang, {{ Auth::user()->name }}.
        </h2>
        <p class="text-sm">Paparan dikemaskini pada {{ now()->format('d/m/Y') }}</p>
    </x-slot>

    <div class="pt-6 pb-6">
        <div class="bg-yellow-100 p-4 border-l-4 border-yellow-500">
            <div class="font-semibold text-yellow-600 uppercase mb-2">
                Tindakan anda
            </div>
            <div class="text-sm text-gray-700">
                <div>Semak <span class="font-medium uppercase">kehadiran pelajar LI</span></div>
            </div>
        </div>
    </div>

    <div class="pb-6">
        <livewire:company-status.pages.index-page />
    </div>

    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6 pb-6">
        <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('project.index') }}" name="Projek Aktif"
            value="{{ $projectActiveCount }}/{{ $projectCount }}">
            <div>
                <img src="{{ asset('img/clipboard.png') }}" class="w-16" alt="">
            </div>
        </x-mysoftcare.general.stats-card>
        <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('intern.index') }}"
            name="Pelajar LI Diterima" status="Diterima" value="{{ $internAcceptedCount }}">
            <div>
                <img src="{{ asset('img/resume.png') }}" class="w-16" alt="">
            </div>
        </x-mysoftcare.general.stats-card>
        <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('intern.index') }}" name="Pelajar LI Aktif"
            value="{{ $internActiveCount }}">
            <div>
                <img src="{{ asset('img/checked (1).png') }}" class="w-16" alt="">
            </div>
        </x-mysoftcare.general.stats-card>
    </div>

    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6 items-start pb-6">
        <div class="md:col-span-2 rounded-lg">
            <livewire:dashboard.partials.project-chart />
        </div>
        <div class="rounded-lg">
            <livewire:dashboard.partials.intern-chart />
        </div>
    </div>

    <div class="pb-6">
        <div class="font-semibold text-xl">
            Projek Aktif
        </div>
        <div class="text-gray-500 mb-4 text-sm">Senarai projek aktif yang terkini</div>
        <livewire:dashboard.tables.project-active-table />
    </div>

    <div class="pb-6">
        <div class="font-semibold text-xl">
            Kontrak Projek
        </div>
        <div class="text-gray-500 mb-4 text-sm">Jumlah nilai kontrak mengikut status projek</div>
        <livewire:dashboard.partials.contract-value-stats />
    </div>

    <div class="pb-6">
        <div class="font-semibold text-xl">
            Permohonan Pelajar LI
        </div>
        <div class="text-gray-500 mb-4 text-sm">Navigasi permohonan pelajar LI</div>
        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6">
            <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('intern.index') }}"
                name="Permohonan Baru" value="0">
            </x-mysoftcare.general.stats-card>
            <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('intern.index') }}"
                name="Permohonan Diterima" value="0">
            </x-mysoftcare.general.stats-card>
        </div>
    </div>

    <div class="pb-6">
        <div class="font-semibold text-xl">
            Kehadiran Pelajar LI
        </div>
        <div class="text-gray-500 mb-4 text-sm">Navigasi kehadiran pelajar LI</div>
        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6">
            <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('attendance.index') }}"
                name="Kehadiran Pelajar LI Aktif" value="0/0">
            </x-mysoftcare.general.stats-card>
        </div>
    </div>

    <div class="pb-6">
        <div class="font-semibold text-xl">
            Tambah Pengguna
        </div>
        <div class="text-gray-500 mb-4 text-sm">Navigasi permohonan pengguna</div>
        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6">
            <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('user.index') }}" name="Pengguna Baru"
                value="0">
            </x-mysoftcare.general.stats-card>
            <x-mysoftcare.general.stats-card colour="bg-white" route="{{ route('user.index') }}" name="Pengguna Aktif"
                value="0">
            </x-mysoftcare.general.stats-card>
        </div>
    </div>

    <div>
        <div class="font-semibold text-xl">
            Kalendar
        </div>
        <div class="text-gray-500 mb-4 text-sm">Senarai acara pada hari ini</div>
        <livewire:dashboard.tables.calendar-event-table-today />
    </div>
</x-admin-layout>
