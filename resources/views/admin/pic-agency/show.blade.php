<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('pic.index') }}" name="Senarai PIC Agensi" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Lihat Maklumat PIC Agensi" icon disabled />
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
                    Maklumat PIC Agensi
                </div>
                <div class="text-sm text-gray-700">
                    Lihat Maklumat PIC Agensi
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Nama
                    </div>
                    <div class="font-medium">
                        {{ $pic->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        No. Telefon
                    </div>
                    <div class="font-medium">
                        {{ $pic->phone_number }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5">
                    <div>
                        Agensi
                    </div>
                    <div class="font-medium col-span-4">
                        <div x-data="{ expanded: false }">
                            <button @click="expanded = ! expanded" class="inline-flex items-center gap-4 mb-4">
                                @if ($pic->agency_id)
                                    {{ $pic->agency->name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            :d="expanded ? 'm4.5 15.75 7.5-7.5 7.5 7.5' : 'm19.5 8.25-7.5 7.5-7.5-7.5'" />
                                    </svg>
                                @else
                                    -
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            :d="expanded ? 'm4.5 15.75 7.5-7.5 7.5 7.5' : 'm19.5 8.25-7.5 7.5-7.5-7.5'" />
                                    </svg>
                                @endif
                            </button>

                            <div x-show="expanded" {{-- @click.outside="expanded = false" --}}>
                                @if ($pic->agency)
                                    <div class="grid grid-cols-5 mb-2">
                                        <div>
                                            No. Telefon
                                        </div>
                                        <div class="bg-yellow-50 py-1 px-3 rounded-lg text-center">
                                            {{ $pic->agency->phone_number }}
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-5 mb-4">
                                        <div>
                                            E-mel
                                        </div>
                                        <div class="bg-yellow-50 py-1 px-3 rounded-lg text-center">
                                            {{ $pic->agency->email }}
                                        </div>
                                    </div>
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Jawatan
                    </div>
                    <div class="font-medium">
                        {{ $pic->position->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Dicipta pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $pic->created_at }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5">
                    <div>
                        Dikemaskini pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $pic->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="pic.index" name="Kembali" class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
