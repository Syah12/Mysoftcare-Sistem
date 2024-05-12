<x-admin-layout>

    <x-slot name="welcome">
        <h2 class="font-semibold text-2xl pt-6 pb-6">
            Selamat datang ke <span class="text-blue-400">Mysoftcare</span>, {{ Auth::user()->name }}.
        </h2>

        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('project.index') }}" name="Senarai Projek" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Semak Maklumat Projek" icon disabled />
        </x-mysoftcare.general.breadcrumbs>
    </x-slot>

    <div class="pt-6">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="py-4 px-6">
                <div class="font-semibold mb-1">
                    Maklumat Projek
                </div>
                <div class="text-sm text-gray-700">
                    Semak Maklumat Projek
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Nama Projek
                    </div>
                    <div class="font-medium">
                        {{ $project->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Tahun
                    </div>
                    <div class="font-medium">
                        {{ $project->year }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Agensi
                    </div>
                    <div class="font-medium col-span-4">
                        <div x-data="{ expanded: false }">
                            <button @click="expanded = ! expanded" class="inline-flex items-center gap-4 mb-2">
                                @if ($project->agency_id)
                                    {{ $project->agency->name }}
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
                                @if ($project->agency)
                                    <div class="grid grid-cols-5 mb-2">
                                        <div>
                                            No. Telefon
                                        </div>
                                        <div>
                                            {{ $project->agency->phone_number }}
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-5">
                                        <div>
                                            E-mel
                                        </div>
                                        <div>
                                            {{ $project->agency->email }}
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
                        PIC Agensi
                    </div>
                    <div class="font-medium col-span-4">
                        <div x-data="{ expanded: false }">
                            <button @click="expanded = ! expanded" class="inline-flex items-center gap-4 mb-2">
                                @if ($project->pic_id)
                                    {{ $project->pic->name }}
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
                                @if ($project->pic)
                                    <div class="grid grid-cols-5 mb-2">
                                        <div>
                                            No. Telefon
                                        </div>
                                        <div>
                                            {{ $project->pic->phone_number }}
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-5">
                                        <div>
                                            Jawatan
                                        </div>
                                        <div>
                                            {{ $project->pic->position->name }}
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
                        Tarikah Mula Kontrak
                    </div>
                    <div class="font-medium">
                        {{ $project->start_date_contract }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Tarikah Akhir Kontrak
                    </div>
                    <div class="font-medium">
                        {{ $project->end_date_contract }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Tempoh Kontrak
                    </div>
                    <div class="font-medium">
                        {{-- {{ $project->contract_period }} --}}
                        @php
                            $startDate = \Carbon\Carbon::parse($project->start_date_contract);
                            $endDate = \Carbon\Carbon::parse($project->end_date_contract);
                            $differenceInMonths = $startDate->diffInMonths($endDate);
                        @endphp

                        {{ $differenceInMonths }} bulan
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Tempoh Jaminan
                    </div>
                    <div class="font-medium">
                        {{ $project->contract_guarentee }} bulan    
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Nilai Kontrak
                    </div>
                    <div class="font-medium">
                        RM {{ $project->contract_value }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        SST
                    </div>
                    <div class="font-medium">
                        @if (is_array($project->sst))
                            @foreach ($project->sst as $url => $filePath)
                                <a class="text-blue-500 underline" href="{{ asset('storage/' . $filePath) }}"
                                    target="blank">Klik di sini</a>
                            @endforeach
                        @else
                            -
                        @endif
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Catatan
                    </div>
                    <div class="font-medium col-span-4">
                        {{ $project->notes }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Pencipta
                    </div>
                    <div class="font-medium">
                        {{ $project->creator }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 mb-4">
                    <div>
                        Status
                    </div>
                    <div class="font-medium">
                        @php
                            $statusColors = [
                                'Berjaya' => 'bg-green-100',
                                'Aktif' => 'bg-blue-100',
                                'EOT' => 'bg-red-100',
                                'Tempoh jaminan' => 'bg-orange-100',
                            ];
                        @endphp

                        <span
                            class="py-2 px-2 rounded-lg text-sm {{ $statusColors[$project->status] ?? 'bg-gray-100' }}">
                            {{ $project->status }}
                        </span>
                    </div>
                </div>
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="grid md:grid-cols-5 mb-4">
                        <div>
                            Dicipta pada
                        </div>
                        <div class="font-medium">
                            {{ $project->created_at }}
                        </div>
                    </div>
                    <div class="grid md:grid-cols-5">
                        <div>
                            Dikemaskini pada
                        </div>
                        <div class="font-medium">
                            {{ $project->updated_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="project.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
