<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>
        <div>{{ __('Papan Utama') }}</div>
    </x-slot>

    <div class="pt-6">
        <livewire:company-status.pages.index-page />

        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6 pb-6">
            <x-mysoftcare.general.stats-card colour="bg-blue-50" route="project.index"
                img="{{ asset('img/accept (1).png') }}" name="Bilangan Projek Aktif" value="{{ $projectActiveCount }}">
                <div class="mb-2">
                    <span class="text-blue-400 font-medium">(Aktif)</span>
                </div>
            </x-mysoftcare.general.stats-card>
            <x-mysoftcare.general.stats-card colour="bg-blue-50" route="intern.index"
                img="{{ asset('img/attendance.png') }}" name="Bilangan Pelajar LI" value="{{ $internActiveCount }}">
                <div class="mb-2">
                    <span class="text-blue-400 font-medium">(Aktif)</span>
                </div>
            </x-mysoftcare.general.stats-card>
            <x-mysoftcare.general.stats-card colour="bg-blue-50" route="intern.index"
                img="{{ asset('img/new-employee.png') }}" name="Bilangan Pelajar LI" status="Diterima"
                value="{{ $internAcceptedCount }}">
                <div class="mb-2">
                    <span class="text-green-400 font-medium">(Diterima)</span>
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
    </div>

    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-6 items-start pb-6">
        <div class="md:col-span-2">
            <livewire:dashboard.partials.project-chart />
        </div>
        <div>
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

    <div>
        <livewire:dashboard.tables.calendar-event-table-today />
    </div>

</x-admin-layout>
