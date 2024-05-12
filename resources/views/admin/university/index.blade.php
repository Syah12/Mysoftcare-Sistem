<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item name="Senarai Institusi" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    @if (!empty($incompletedData))
        <div class="pt-6">
            <div class="bg-yellow-100 p-4 border-l-4 border-yellow-500">
                <div class="font-semibold text-yellow-700 uppercase">
                    Tindakan anda
                </div>
                <div class="text-sm text-gray-700 mb-2">
                    Kemaskini institusi
                </div>
                <div>
                    <ul>
                        @foreach ($incompletedData as $id => $name)
                            <li class="py-1"><a href="{{ route('university.edit', $id) }}"
                                    class="hover:text-yellow-700">{{ $name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="pt-6">
        <livewire:university.tables.university-table />
    </div>
</x-admin-layout>
