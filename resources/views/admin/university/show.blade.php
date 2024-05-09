<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('university.index') }}" name="Senarai Institusi"
                icon />
            <x-mysoftcare.general.breadcrumbs-item name="Semak Maklumat Institusi" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="py-4 px-6">
                <div class="font-semibold mb-1">
                    Maklumat Institusi
                </div>
                <div class="text-sm text-gray-700">
                    Semak Maklumat Institusi
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Jenis Institusi :
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
                        Nama :
                    </div>
                    <div class="font-medium">
                        {{ $university->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        No. Telefon :
                    </div>
                    <div class="font-medium">
                        {{ $university->phone_number }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        E-mel :
                    </div>
                    <div class="font-medium">
                        {{ $university->email }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Alamat :
                    </div>
                    <div class="font-medium">
                        {{ $university->address }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Poskod :
                    </div>
                    <div class="font-medium">
                        {{ $university->postcode }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Negera :
                    </div>
                    <div class="font-medium">
                        {{ $university->country }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Negeri :
                    </div>
                    <div class="font-medium">
                        {{ $university->state }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Daerah :
                    </div>
                    <div class="font-medium">
                        {{ $university->district }}
                    </div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="grid md:grid-cols-5 mb-4">
                        <div>
                            Dicipta pada :
                        </div>
                        <div class="font-medium">
                            {{ $university->created_at }}
                        </div>
                    </div>
                    <div class="grid md:grid-cols-5">
                        <div>
                            Dikemaskini pada :
                        </div>
                        <div class="font-medium">
                            {{ $university->updated_at }}
                        </div>
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
