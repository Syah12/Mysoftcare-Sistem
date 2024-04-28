<div>
    <div class="flex flex-col items-center space-y-4">
        <div class="flex flex-col sm:flex-row items-center sm:space-x-4 space-y-2 sm:space-y-0">
            <div class="flex flex-col">
                <label for="fromDate" class="block text-sm font-medium text-gray-700">From Date</label>
                <input type="date" id="fromDate" name="fromDate" wire:model="fromDate"
                    class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex flex-col">
                <label for="toDate" class="block text-sm font-medium text-gray-700">To Date</label>
                <input type="date" id="toDate" name="toDate" wire:model="toDate"
                    class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        </div>

        <button wire:click="generate()"
            class="px-4 py-2 text-lg font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Generate
            Duty Roster</button>

        @if ($generateButtonPressed)
            <div class="overflow-x-auto">
                <h2 class="text-lg font-bold mb-2">Top Office Duty Roster</h2>
                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <!-- Table Header -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            </th>
                            @foreach ($dutyRostersTopOffice[0]['duties'] as $dutyId => $employeeName)
                                @php
                                    $dutyName = App\Models\Duty::find($dutyId)->name;
                                @endphp
                                <th
                                    class="px-6 py-3 text-left text-sm font-bold text-black bg-gray-200 uppercase tracking-wider">
                                    {{ $dutyName }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-blue-200">
                        @foreach ($dutyRostersTopOffice as $week)
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase">
                                    {{ $week['date_range'] }}</th>
                                @foreach ($week['duties'] as $employeeId)
                                    @php
                                        $employee = App\Models\Employee::find($employeeId);
                                    @endphp
                                    <td class="px-6 py-4 whitespace-nowrap text-lg"
                                        style="background-color: {{ $employee->colour }}">
                                        {{ $employee->full_name }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="overflow-x-auto mt-8">
                <h2 class="text-lg font-bold mb-2">Bottom Office Duty Roster</h2>
                <table class="table-auto min-w-full divide-y divide-gray-200">
                    <!-- Table Header -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            </th>
                            @foreach ($dutyRostersBottomOffice[0]['duties'] as $dutyId => $employeeName)
                                @php
                                    $dutyName = App\Models\Duty::find($dutyId)->name;
                                @endphp
                                <th
                                    class="px-6 py-3 text-left text-sm font-bold text-black bg-gray-200 uppercase tracking-wider">
                                    {{ $dutyName }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-blue-200">
                        @foreach ($dutyRostersBottomOffice as $week)
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase">
                                    {{ $week['date_range'] }}</th>
                                @foreach ($week['duties'] as $employeeId)
                                    @php
                                        $employee = App\Models\Employee::find($employeeId);
                                    @endphp
                                    <td class="px-6 py-4 whitespace-nowrap text-lg"
                                        style="background-color: {{ $employee->colour }}">
                                        {{ $employee->full_name }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
