<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('position.index') }}" name="Senarai Jawatan" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Lihat Maklumat Jawatan" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
        <h2 class="font-semibold text-2xl pt-6">
            Selamat datang, {{ Auth::user()->name }}.
        </h2>
        <p class="text-sm">Paparan dikemaskini pada {{ now()->format('d/m/Y') }}</p>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="py-4 px-6">
                <div class="font-semibold mb-1">
                    Maklumat Jawatan
                </div>
                <div class="text-sm text-gray-700">
                    Lihat Maklumat Jawatan
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Jawatan
                    </div>
                    <div class="font-medium">
                        {{ $position->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Dicipta pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $position->created_at }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5">
                    <div>
                        Dikemaskini pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $position->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="position.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
