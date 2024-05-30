<x-admin-layout>
    <x-slot name="welcome">
        <x-mysoftcare.general.breadcrumbs>
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('dashboard') }}" name="Papan Utama" />
            <x-mysoftcare.general.breadcrumbs-item route="{{ route('project.index') }}" name="Senarai Projek" icon />
            <x-mysoftcare.general.breadcrumbs-item name="Lihat Maklumat Projek" icon disabled />
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
                    Maklumat Projek
                </div>
                <div class="text-sm text-gray-700">
                    Lihat Maklumat Projek
                </div>
            </div>
            <hr>
            <div class="py-4 px-6">
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Nama Projek
                    </div>
                    <div class="font-medium">
                        {{ $project->name }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Tahun
                    </div>
                    <div class="font-medium">
                        {{ $project->year }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Tarikah Mula Kontrak
                    </div>
                    <div class="font-medium">
                        {{ \Carbon\Carbon::parse($project->start_date_contract)->format('d/m/Y') }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Tarikah Akhir Kontrak
                    </div>
                    <div class="font-medium">
                        {{ \Carbon\Carbon::parse($project->end_date_contract)->format('d/m/Y') }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Tempoh Kontrak
                    </div>
                    <div class="font-medium">
                        @php
                            $startDate = \Carbon\Carbon::parse($project->start_date_contract);
                            $endDate = \Carbon\Carbon::parse($project->end_date_contract);
                            $interval = $startDate->diff($endDate);
                            $differenceInMonths = $interval->m + $interval->y * 12;
                            $differenceInDays = $interval->d;
                        @endphp

                        @if ($differenceInMonths > 0 && $differenceInDays > 0)
                            {{ $differenceInMonths }} bulan dan {{ $differenceInDays }} hari
                        @elseif ($differenceInMonths > 0)
                            {{ $differenceInMonths }} bulan
                        @elseif ($differenceInDays > 0)
                            {{ $differenceInDays }} hari
                        @else
                            -
                        @endif
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Tempoh Jaminan
                    </div>
                    <div class="font-medium">
                        {{ $project->contract_guarentee }} bulan
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Nilai Kontrak
                    </div>
                    <div class="font-medium">
                        RM {{ $project->contract_value }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
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
                <div class="grid md:grid-cols-5 items-start mb-4">
                    <div>
                        Catatan
                    </div>
                    <div class="font-medium col-span-4">
                        {{ $project->notes }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Pencipta
                    </div>
                    <div class="font-medium">
                        {{ $project->creator }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center mb-4">
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
                <div class="grid md:grid-cols-5 items-center mb-4">
                    <div>
                        Dicipta pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $project->created_at }}
                    </div>
                </div>
                <div class="grid md:grid-cols-5 items-center">
                    <div>
                        Dikemaskini pada
                    </div>
                    <div class="font-medium bg-blue-50 py-1 px-3 rounded-lg text-center">
                        {{ $project->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div x-data="{ tab: 'tab1' }">
            <ul class="flex border-b">
                <li class="-mb-px mr-1">
                    <a class="inline-block rounded-t-lg py-4 px-6 font-semibold" href="#"
                        :class="{ 'bg-white text-blue-400 border-l border-t border-r': tab == 'tab1' }"
                        @click.prevent="tab = 'tab1'">Agensi</a>
                </li>
                <li class="-mb-px mr-1">
                    <a class="inline-block rounded-t-lg py-4 px-6 font-semibold" href="#"
                        :class="{ 'bg-white text-blue-400 border-l border-t border-r': tab == 'tab2' }"
                        @click.prevent="tab = 'tab2'">PIC Agensi</a>
                </li>
            </ul>
            <div class="content bg-white border-l border-r border-b rounded-b-lg pt-4">
                <div x-show="tab == 'tab1'">
                    <div class="pb-4 px-6">
                        <div class="font-semibold mb-1">
                            Maklumat Agensi
                        </div>
                        <div class="text-sm text-gray-700">
                            Lihat maklumat agensi yang terlibat
                        </div>
                    </div>
                    <hr>
                    <div class="py-4 px-6">
                        @if ($project->agency_id)
                            <div class="mb-4">
                                {{ $project->agency->name }}
                            </div>
                            <div class="grid grid-cols-5 items-center mb-4">
                                <div>
                                    No. Telefon
                                </div>
                                <div class="font-medium">
                                    {{ $project->agency->phone_number }}
                                </div>
                            </div>
                            <div class="grid grid-cols-5 items-center">
                                <div>
                                    E-mel
                                </div>
                                <div class="font-medium">
                                    {{ $project->agency->email }}
                                </div>
                            </div>
                        @else
                            -
                        @endif
                    </div>
                </div>
                <div x-show="tab == 'tab2'">
                    <div class="pb-4 px-6">
                        <div class="font-semibold mb-1">
                            Maklumat PIC agensi
                        </div>
                        <div class="text-sm text-gray-700">
                            Lihat maklumat PIC agensi yang terlibat
                        </div>
                    </div>
                    <hr>
                    <div class="py-4 px-6">
                        @if ($project->pic_id)
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
                                    @foreach ($project->pic_id as $picId)
                                        @php
                                            $pic = \App\Models\PIC::find($picId);
                                        @endphp
                                        @if ($pic)
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
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6">
        @empty($project->mileage && $project->date && $project->place && $project->status_mileage)
            <div class="bg-blue-100 p-4 border-l-4 border-blue-500">
                <div class="flex flex-row items-center gap-4">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold text-blue-600 uppercase mb-1">
                            Tiada Perbatuan Projek
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div x-data="{ expanded: false }" class="bg-white rounded-lg border border-gray-200">
                <button class="flex justify-between items-center w-full py-4 px-6" @click="expanded = ! expanded">
                    <div>
                        Perbatuan
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                :d="expanded ? 'm4.5 15.75 7.5-7.5 7.5 7.5' : 'm19.5 8.25-7.5 7.5-7.5-7.5'" />
                        </svg>
                    </div>
                </button>

                <div x-show="expanded" {{-- @click.outside="expanded = false" --}}>
                    <div class="py-4 px-6">
                        <div class="font-semibold mb-1">
                            Maklumat Perbatuan
                        </div>
                        <div class="text-sm text-gray-700">
                            Lihat Maklumat Perbatuan
                        </div>
                    </div>
                    <hr>
                    <div class="py-4 px-6">
                        <div class="grid md:grid-cols-5 items-center mb-4">
                            <div>
                                Perbatuan
                            </div>
                            <div class="font-medium">
                                {{ $project->mileage }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-5 items-center mb-4">
                            <div>
                                Tarikh
                            </div>
                            <div class="font-medium">
                                {{ \Carbon\Carbon::parse($project->date)->format('d/m/Y') }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-5 items-center mb-4">
                            <div>
                                Tempat
                            </div>
                            <div class="font-medium">
                                {{ $project->place }}
                            </div>
                        </div>
                        <div class="grid md:grid-cols-5 items-center">
                            <div>
                                Status
                            </div>
                            <div class="font-medium">
                                {{ $project->status_mileage }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endempty
    </div>

    <div class="pt-6 flex flex-row-reverse">
        <x-mysoftcare.general.primary-link route="project.index" name="Kembali"
            class="bg-white border border-gray-200" />
    </div>

</x-admin-layout>
