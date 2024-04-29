@extends('pdf.layouts.base')

@section('title', $title)

@section('content')
    <div class="w-full">
        <div class="space-y-4">
            <img src="{{ public_path('img/mysoftcare.png') }}" alt="Mysoftcare Logo">

            <h2 class="text-lg font-bold">Jadual Bertugas</h2>
            <p class="mb-2">Pejabat Atas</p>
            <table class="table-auto divide-y divide-gray-200" style="width: 100%;">
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
                                class="px-6 py-3 text-center text-sm font-bold text-black bg-gray-200 uppercase tracking-wider">
                                {{ $dutyName }}</th>
                        @endforeach
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="bg-blue-200">
                    @foreach ($dutyRostersTopOffice as $week)
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase whitespace-nowrap">
                                {{ $week['date_range'] }}
                            </th>
                            @foreach ($week['duties'] as $employeeId)
                                @php
                                    $employee = App\Models\Employee::find($employeeId);
                                @endphp
                                <td class="px-6 py-4 text-center whitespace-nowrap"
                                    style="background-color: {{ $employee->colour }}">
                                    {{ $employee->full_name }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br><br><br>

            <h2 class="text-lg font-bold">Jadual Bertugas</h2>
            <p class="mb-2">Pejabat Bawah</p>
            <table class="table-auto divide-y divide-gray-200" style="width: 100%;">
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
                                class="px-6 py-3 text-center text-sm font-bold text-black bg-gray-200 uppercase tracking-wider">
                                {{ $dutyName }}</th>
                        @endforeach
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody class="bg-blue-200">
                    @foreach ($dutyRostersBottomOffice as $week)
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-black uppercase whitespace-nowrap">
                                {{ $week['date_range'] }}
                            </th>
                            @foreach ($week['duties'] as $employeeId)
                                @php
                                    $employee = App\Models\Employee::find($employeeId);
                                @endphp
                                <td class="px-6 py-4 text-center whitespace-nowrap"
                                    style="background-color: {{ $employee->colour }}">
                                    {{ $employee->full_name }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
