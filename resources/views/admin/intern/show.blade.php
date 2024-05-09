<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('intern.index') }}" name="Senarai Pelajar LI" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Semak Maklumat Pelajar LI" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="py-4 px-6">
                <div class="font-semibold mb-1">
                    Maklumat Pelajar LI
                </div>
                <div class="text-sm text-gray-700">
                    Semak Maklumat Pelajar LI
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Nama :
                            </div>
                            <div class="font-medium">
                                {{ $intern->name }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                IC :
                            </div>
                            <div class="font-medium">
                                {{ $intern->ic }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                E-mel :
                            </div>
                            <div class="font-medium">
                                {{ $intern->email }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                No. Telefon :
                            </div>
                            <div class="font-medium">
                                {{ $intern->phone_number }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Jantina :
                            </div>
                            <div class="font-medium">
                                {{ $intern->gender }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Universiti :
                            </div>
                            <div class="font-medium">
                                @if ($intern->university)
                                    {{ $intern->university->name }}
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Kemahiran :
                            </div>
                            <div class="font-medium">
                                @if ($intern->skills)
                                    @foreach ($intern->skills as $skill)
                                        <div>
                                            {{ $skill }}
                                        </div>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Taraf Pendidikan :
                            </div>
                            <div class="font-medium">
                                @if ($intern->educational_level)
                                    @foreach ($intern->educational_level as $educationalLevel)
                                        <div>
                                            {{ $educationalLevel['year'] }},
                                            {{ $educationalLevel['educational_level'] }},
                                            @if ($educationalLevel['institution'])
                                                @php
                                                    $university = \App\Models\University::find(
                                                        $educationalLevel['institution'],
                                                    );
                                                @endphp
                                                @if ($university)
                                                    {{ $university->name }}
                                                @endif
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Tarikh Mula :
                            </div>
                            <div class="font-medium">
                                {{ $intern->start_intern }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Tarikh Tamat :
                            </div>
                            <div class="font-medium">
                                {{ $intern->end_intern }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Resume :
                            </div>
                            <div class="font-medium">
                                @if (is_array($intern->resume))
                                    @foreach ($intern->resume as $url => $filePath)
                                        <a class="text-blue-500 underline" href="{{ asset('storage/' . $filePath) }}"
                                            target="blank">Klik di sini</a>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Surat Permohonan :
                            </div>
                            <div class="font-medium">
                                @if (is_array($intern->letter))
                                    @foreach ($intern->letter as $url => $filePath)
                                        <a class="text-blue-500 underline" href="{{ asset('storage/' . $filePath) }}"
                                            target="blank">Klik di sini</a>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 mb-4">
                            <div>
                                Status :
                            </div>
                            <div class="font-medium">
                                @php
                                    $statusColors = [
                                        'Aktif' => 'bg-blue-100',
                                        'Diterima' => 'bg-green-100',
                                        'Ditolak' => 'bg-red-100',
                                    ];
                                @endphp

                                <span
                                    class="py-2 px-2 rounded-lg text-sm {{ $statusColors[$intern->status] ?? 'bg-orange-100' }}">
                                    {{ $intern->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        @if (is_array($intern->image))
                            @foreach ($intern->image as $uuid => $filePath)
                                <img src="{{ asset('storage/' . $filePath) }}" class="w-40 rounded-lg" alt="">
                            @endforeach
                        @else
                            <div
                                class="bg-blue-100 w-40 rounded-lg h-40 items-center flex justify-center relative overflow-hidden">
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
                            Dicipta pada :
                        </div>
                        <div class="font-medium">
                            {{ $intern->created_at }}
                        </div>
                    </div>
                    <div class="grid md:grid-cols-5">
                        <div>
                            Dikemaskini pada :
                        </div>
                        <div class="font-medium">
                            {{ $intern->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="intern.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
