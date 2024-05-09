<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('pic.index') }}" name="Senarai PIC Agensi" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Semak Maklumat PIC Agensi" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="py-4 px-6">
                <div class="font-semibold mb-1">
                    Maklumat PIC Agensi
                </div>
                <div class="text-sm text-gray-700">
                    Semak Maklumat PIC Agensi
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Nama :
                    </div>
                    <div class="font-medium">
                        {{ $pic->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        No. Telefon :
                    </div>
                    <div class="font-medium">
                        {{ $pic->phone_number }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Agensi :
                    </div>
                    <div class="font-medium">
                        {{ $pic->agency->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Jawatan :
                    </div>
                    <div class="font-medium">
                        {{ $pic->position->name }}
                    </div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="grid md:grid-cols-5 mb-4">
                        <div>
                            Dicipta pada :
                        </div>
                        <div class="font-medium">
                            {{ $pic->created_at }}
                        </div>
                    </div>
                    <div class="grid md:grid-cols-5">
                        <div>
                            Dikemaskini pada :
                        </div>
                        <div class="font-medium">
                            {{ $pic->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="pic.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
