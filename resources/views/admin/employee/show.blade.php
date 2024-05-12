<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('employee.index') }}" name="Senarai Staf" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Semak Maklumat Staf" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="py-4 px-6">
                <div class="font-semibold mb-1">
                    Maklumat Staf
                </div>
                <div class="text-sm text-gray-700">
                    Semak Maklumat Staf
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Nama
                            </div>
                            <div class="font-medium">
                                {{ $employee->name }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Tarikh Lahir
                            </div>
                            <div class="font-medium">
                                {{ $employee->birth_date }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                E-mel
                            </div>
                            <div class="font-medium">
                                {{ $employee->email }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                No. Telefon
                            </div>
                            <div class="font-medium">
                                {{ $employee->phone_number }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Jantina
                            </div>
                            <div class="font-medium">
                                {{ $employee->gender }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Jawatan
                            </div>
                            <div class="font-medium">
                                @if ($employee->position_id)
                                    {{ $employee->position->name }}
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        @if (is_array($employee->image))
                            @foreach ($employee->image as $uuid => $filePath)
                                <img src="{{ asset('storage/' . $filePath) }}" class="w-40 rounded-lg" alt="">
                            @endforeach
                        @else
                            <div
                                class="bg-yellow-50 w-40 rounded-lg h-40 items-center flex justify-center relative overflow-hidden">
                                <div class="absolute inset-0 flex justify-center items-center transform -rotate-45">
                                    <span class="text-gray-600 font-medium">Tiada Gambar</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="grid md:grid-cols-5 mb-4">
                        <div>
                            Dicipta pada
                        </div>
                        <div class="font-medium">
                            {{ $employee->created_at }}
                        </div>
                    </div>
                    <div class="grid md:grid-cols-5">
                        <div>
                            Dikemaskini pada
                        </div>
                        <div class="font-medium">
                            {{ $employee->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="employee.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
