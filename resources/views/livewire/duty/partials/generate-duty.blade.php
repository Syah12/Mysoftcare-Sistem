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
                                @foreach ($dutyRostersTopOffice[0]['duties'] as $dutyId => $employeeName)
                                    @php
                                        $dutyName = App\Models\Duty::find($dutyId)->name;
                                    @endphp
                                    <th
                                        class="px-6 py-3 text-left text-sm font-bold text-black bg-gray-100 uppercase tracking-wider text-center">
                                        {{ $dutyName }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-blue-100">
                            @foreach ($dutyRostersTopOffice as $week)
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase">
                                        {{ $week['date_range'] }}</th>
                                    @foreach ($week['duties'] as $employeeId)
                                        @php
                                            $employee = App\Models\Employee::find($employeeId);
                                        @endphp
                                        <td class="px-6 py-4 whitespace-nowrap"
                                            style="background-color: {{ $employee->colour }}">
                                            {{ $employee->full_name }}
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
                                @foreach ($dutyRostersBottomOffice[0]['duties'] as $dutyId => $employeeName)
                                    @php
                                        $dutyName = App\Models\Duty::find($dutyId)->name;
                                    @endphp
                                    <th
                                        class="px-6 py-3 text-left text-sm font-bold text-black bg-gray-100 uppercase tracking-wider text-center">
                                        {{ $dutyName }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-blue-100">
                            @foreach ($dutyRostersBottomOffice as $week)
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase">
                                        {{ $week['date_range'] }}</th>
                                    @foreach ($week['duties'] as $employeeId)
                                        @php
                                            $employee = App\Models\Employee::find($employeeId);
                                        @endphp
                                        <td class="px-6 py-4 whitespace-nowrap"
                                            style="background-color: {{ $employee->colour }}">
                                            {{ $employee->full_name }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-row-reverse py-5">
                    <button wire:click="print()"
                        class="px-4 py-2 font-medium text-white bg-blue-500 rounded-md hover:bg-blue-700">Cetak
                        PDF</button>
                </div>
            @endif
        </div>
    </x-mysoftcare.general.background-card>
</div>
