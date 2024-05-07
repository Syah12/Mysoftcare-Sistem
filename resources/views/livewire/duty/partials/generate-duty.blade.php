<div>
    <x-mysoftcare.general.background-card>
        <div class="space-y-4">
            <div class="flex flex-col sm:flex-row items-center sm:space-x-4 space-y-2 sm:space-y-0">
                <div class="flex flex-col w-full">
                    <label for="fromDate" class="block text-gray-700">Tarikh mula</label>
                    <input type="date" id="fromDate" name="fromDate" wire:model="fromDate"
                        class="px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="flex flex-col w-full">
                    <label for="toDate" class="block text-gray-700">Tarikh akhir</label>
                    <input type="date" id="toDate" name="toDate" wire:model="toDate"
                        class="px-3 py-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <div class="flex flex-row-reverse">
                <button wire:click="generate()"
                    class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-700">Jana Jadual
                    Bertugas</button>
            </div>



            @if ($generateButtonPressed)
                <div class="overflow-x-auto">
                    <h2 class="text-lg font-bold">Jadual Bertugas</h2>
                    <p class="mb-2">Pejabat Atas</p>
                    <table class="table-auto min-w-full divide-y divide-gray-200 border border-gray-200">
                        <!-- Table Header -->
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                </th>
                                @foreach ($dutyRostersTopOffice[0]['duties'] as $dutyId => $people)
                                    @php
                                        $dutyName = App\Models\Duty::find($dutyId)->name;
                                    @endphp
                                    <th
                                        class="px-6 py-3 text-center text-sm font-bold text-black bg-gray-100 uppercase tracking-wider">
                                        {{ $dutyName }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-blue-100">
                            @foreach ($dutyRostersTopOffice as $week)
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-black uppercase whitespace-nowrap">
                                        {{ $week['date_range'] }}
                                    </th>
                                    @foreach ($week['duties'] as $people)
                                        <td class="px-6 py-4 text-center whitespace-nowrap"
                                            style="background-color: {{ $people->colour }}">
                                            {{ $people->name }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <br>

                <div class="overflow-x-auto mt-8">
                    <h2 class="text-lg font-bold">Jadual Bertugas</h2>
                    <p class="mb-2">Pejabat Bawah</p>
                    <table class="table-auto min-w-full divide-y divide-gray-200 border border-gray-200">
                        <!-- Table Header -->
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                </th>
                                @foreach ($dutyRostersBottomOffice[0]['duties'] as $dutyId => $people)
                                    @php
                                        $dutyName = App\Models\Duty::find($dutyId)->name;
                                    @endphp
                                    <th
                                        class="px-6 py-3 text-center text-sm font-bold text-black bg-gray-100 uppercase tracking-wider">
                                        {{ $dutyName }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-blue-100">
                            @foreach ($dutyRostersBottomOffice as $week)
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-medium text-black uppercase whitespace-nowrap">
                                        {{ $week['date_range'] }}
                                    </th>
                                    @foreach ($week['duties'] as $people)
                                        <td class="px-6 py-4 text-center whitespace-nowrap"
                                            style="background-color: {{ $people->colour }}">
                                            {{ $people->name }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-row-reverse">
                    <button wire:click="print"
                        class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-700 inline-flex items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z"
                                clip-rule="evenodd" />
                        </svg>
                        Cetak PDF</button>
                </div>
            @endif
        </div>
    </x-mysoftcare.general.background-card>
</div>
