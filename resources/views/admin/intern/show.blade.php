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
        <div class="bg-white p-4 rounded-lg border border-gray-200">
            <div class="grid grid-cols-6 gap-6 items-center">
                <div class="col-span-2 flex justify-center">
                    @if (is_array($intern->image))
                        @foreach ($intern->image as $uuid => $filePath)
                            <img src="{{ asset('storage/' . $filePath) }}" class="w-60 rounded-xl mb-4  "
                                alt="">
                        @endforeach
                    @endif
                </div>
                <div class="col-span-4">
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Nama :
                        </div>
                        <div class="font-medium">
                            {{ $intern->name }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            IC :
                        </div>
                        <div class="font-medium">
                            {{ $intern->ic }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            E-mel :
                        </div>
                        <div class="font-medium">
                            {{ $intern->email }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            No. Telefon :
                        </div>
                        <div class="font-medium">
                            {{ $intern->phone_number }}
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mb-2">
                        <div>
                            Jantina :
                        </div>
                        <div class="font-medium">
                            {{ $intern->gender }}
                        </div>
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
                        @endif
                    </div>

                    <div class="font-medium">
                        @if ($intern->skills)
                            @foreach ($intern->skills as $skill)
                                {{ $skill }}
                            @endforeach
                        @endif
                    </div>
                    <div class="font-medium">
                        @if ($intern->university)
                            {{ $intern->university->name }}
                        @else
                            Tiada maklumat
                        @endif
                    </div>
                    <div class="font-medium">
                        {{ $intern->training_period }} bulan
                    </div>
                    <div class="font-medium">
                        {{ $intern->start_intern }}
                    </div>
                    <div class="font-medium">
                        {{ $intern->end_intern }}
                    </div>
                    <div class="font-medium">
                        {{ $intern->status }}
                    </div>
                    <div class="font-medium">
                        {{ $intern->office_position }}
                    </div>
                    @if (is_array($intern->resume))
                        @foreach ($intern->resume as $url => $filePath)
                            <a href="{{ asset('storage/' . $filePath) }}" target="blank">Klik Resume</a>
                        @endforeach
                    @endif
                    @if (is_array($intern->letter))
                        @foreach ($intern->letter as $url => $filePath)
                            <a href="{{ asset('storage/' . $filePath) }}" target="blank">Klik Surat</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
