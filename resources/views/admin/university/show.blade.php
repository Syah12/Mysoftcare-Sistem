<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('university.index') }}" name="Senarai Institusi"
                icon />
            <x-mysoftcare.general.breadcrumbs-item name="Lihat Maklumat Institusi" icon disabled />
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
                    Maklumat Institusi
                </div>
                <div class="text-sm text-gray-700">
                    Lihat Maklumat Institusi
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Jenis Institusi
                    </div>
                    <div class="font-medium">
                        @if ($university->is_university == true)
                            Universiti
                        @else
                            Sekolah
                        @endif
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Nama
                    </div>
                    <div class="font-medium">
                        {{ $university->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        No. Telefon
                    </div>
                    <div class="font-medium">
                        {{ $university->phone_number }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Alamat
                    </div>
                    <div class="font-medium">
                        {{ $university->address }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Poskod
                    </div>
                    <div class="font-medium">
                        {{ $university->postcode }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Negera
                    </div>
                    <div class="font-medium">
                        {{ $university->country }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Negeri
                    </div>
                    <div class="font-medium">
                        {{ $university->state }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Daerah
                    </div>
                    <div class="font-medium">
                        {{ $university->district }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Dicipta pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $university->created_at }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5">
                    <div>
                        Dikemaskini pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $university->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="university.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
