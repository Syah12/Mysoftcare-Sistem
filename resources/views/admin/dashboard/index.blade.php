<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item name="Papan Utama" disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6 pb-6">
        <div class="bg-yellow-100 p-4 border-l-4 border-yellow-500">
            <div class="font-semibold text-yellow-600 uppercase mb-2">
                Tindakan anda
            </div>
            <div class="text-sm text-gray-700 ml-6">
                <ol class="list-decimal">
                    <li>Kemaskini <span class="font-medium uppercase">status bekerja syarikat</span></li>
                    <li>Semak <span class="font-medium uppercase">kehadiran pelajar li</span></li>
                </ol>
            </div>
            {{-- @if (!empty($incompletedData))
                <div>
                    <ul class="font-medium">
                        @foreach ($incompletedData as $id => $name)
                            <li><a href="{{ route('university.edit', $id) }}">{{ $name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
    </div>

    <div class="pb-6">
        <livewire:company-status.pages.index-page />
    </div>

    <div class="grid md:grid-cols-4 sm:grid-cols-1 gap-6 pb-6">
        <x-mysoftcare.general.stats-card colour="bg-blue-50" route="{{ route('project.index') }}"
            img="{{ asset('img/software (1).png') }}" name="Bilangan Projek" value="{{ $projectCount }}">
            <div class="mb-2">
                <span class="text-gray-500 font-medium">Keseluruhan</span>
            </div>
        </x-mysoftcare.general.stats-card>
        <x-mysoftcare.general.stats-card colour="bg-blue-50" route="{{ route('project.index') }}"
            img="{{ asset('img/accept (1).png') }}" name="Bilangan Projek" value="{{ $projectActiveCount }}">
            <div class="mb-2">
                <span class="text-blue-400 font-medium">Aktif</span>
            </div>
        </x-mysoftcare.general.stats-card>
        <x-mysoftcare.general.stats-card colour="bg-blue-50" route="{{ route('intern.index') }}"
            img="{{ asset('img/new-employee.png') }}" name="Bilangan Pelajar LI" status="Diterima"
            value="{{ $internAcceptedCount }}">
            <div class="mb-2">
                <span class="text-green-400 font-medium">Diterima</span>
            </div>
        </x-mysoftcare.general.stats-card>
        <x-mysoftcare.general.stats-card colour="bg-blue-50" route="{{ route('intern.index') }}"
            img="{{ asset('img/attendance.png') }}" name="Bilangan Pelajar LI" value="{{ $internActiveCount }}">
            <div class="mb-2">
                <span class="text-blue-400 font-medium">Aktif</span>
            </div>
        </x-mysoftcare.general.stats-card>
    </div>

    <div class="grid md:grid-cols-2 gap-8 pb-6">
        <div class="flex justify-between">
            <x-mysoftcare.general.stat-link name="Bilangan Projek" value="{{ $projectCount }}"
                route="{{ 'project.index' }}" />
        </div>
        <div class="flex justify-between">
            <x-mysoftcare.general.stat-link name="Bilangan Pelajar LI" value="{{ $internCount }}"
                route="{{ 'intern.index' }}" />
        </div>
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
        <livewire:dashboard.partials.contract-value-stats />
    </div>

    <div class="flex justify-between pb-6">
        <x-mysoftcare.general.stat-link name="Acara hari ini" value="{{ $eventToday }}"
            route="{{ 'calendar-event.index' }}" />
    </div>

    <div class="pb-6">
        <livewire:dashboard.tables.calendar-event-table-today />
    </div>

    <div class="flex justify-between pb-6">
        <x-mysoftcare.general.stat-link name="Kehadiran hari ini" value="0" route="{{ 'attendance.index' }}" />
    </div>

    <div class="grid md:grid-cols-2 sm:grid-cols-1 gap-6">
        {{-- <x-mysoftcare.general.stats-card colour="bg-blue-50" route="attendance.index"
            img="{{ asset('img/verified-user.png') }}" name="Kehadiran Staf" value="0/0">
        </x-mysoftcare.general.stats-card> --}}
            <x-mysoftcare.general.stats-card colour="bg-blue-50" route="{{ route('attendance.index') }}"
                img="{{ asset('img/verified-user.png') }}" name="Kehadiran Pelajar LI" value="0/0">
            </x-mysoftcare.general.stats-card>
    </div>

</x-admin-layout>
