<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('agency.index') }}" name="Senarai Agensi" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Lihat Maklumat Agensi" icon disabled />
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
                    Maklumat Agensi
                </div>
                <div class="text-sm text-gray-700">
                    Lihat Maklumat Agensi
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Nama
                    </div>
                    <div class="font-medium">
                        {{ $agency->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        No. Telefon
                    </div>
                    <div class="font-medium">
                        {{ $agency->phone_number }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        E-mel
                    </div>
                    <div class="font-medium">
                        {{ $agency->email }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Alamat
                    </div>
                    <div class="font-medium">
                        {{ $agency->address }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Poskod
                    </div>
                    <div class="font-medium">
                        {{ $agency->postcode }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Negera
                    </div>
                    <div class="font-medium">
                        {{ $agency->country }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Negeri
                    </div>
                    <div class="font-medium">
                        {{ $agency->state }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Daerah
                    </div>
                    <div class="font-medium">
                        {{ $agency->district }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Dicipta pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $agency->created_at }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5">
                    <div>
                        Dikemaskini pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $agency->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="py-4 px-6">
                <div class="font-semibold mb-1">
                    Maklumat PIC agensi
                </div>
                <div class="text-sm text-gray-700">
                    Lihat maklumat PIC agensi
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 text-start font-medium">
                                Nama
                            </th>
                            <th scope="col" class="py-3 text-start font-medium">
                                No. Telefon
                            </th>
                            <th scope="col" class="py-3 text-start font-medium">
                                Jawatan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($agency->pic as $pic)
                            <tr>
                                <td scope="col" class="py-3 text-start">
                                    {{ $pic->name }}
                                </td>
                                <td scope="col" class="py-3 text-start">
                                    {{ $pic->phone_number }}
                                </td>
                                <td scope="col" class="py-3 text-start">
                                    {{ $pic->position->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="agency.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
